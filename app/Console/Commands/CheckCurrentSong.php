<?php

namespace App\Console\Commands;

use App\Models\Station;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\StationStatus;
use App\Models\PlaybackHistory;

class CheckCurrentSong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'radio:check-current-song';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


    public function handle()
    {
        $now = Carbon::now();
        $day = $now->locale('es')->isoFormat('dddd'); // Ej: 'lunes'
        $time = $now->format('H:i:s');

        $this->info('Hora actual detectada: ' . $time);
        $this->info('Día actual detectado: ' . $day);

        foreach (Station::where('is_active', true)->get() as $station) {
            $schedules = $station->schedules()
                ->where(function ($q) use ($day) {
                    $q->where('day_of_week', $day)
                        ->orWhere('day_of_week', 'Todos');
                })
                ->get();

            $schedule = null;
            foreach ($schedules as $sch) {
                $this->info('Franja: ' . $sch->start_time . ' - ' . $sch->end_time . ' | Día: ' . $sch->day_of_week);
                $start = $sch->start_time;
                $end = $sch->end_time;
                if ($start === $end) {
                    $this->info('Franja 24h detectada');
                    $schedule = $sch;
                    break;
                } elseif ($start < $end) {
                    // Franja normal
                    if ($time >= $start && $time <= $end) {
                        $this->info('Franja normal activa');
                        $schedule = $sch;
                        break;
                    }
                } else {
                    // Franja que cruza medianoche
                    if ($time >= $start || $time <= $end) {
                        $this->info('Franja cruzando medianoche activa');
                        $schedule = $sch;
                        break;
                    }
                }
            }

            if ($schedule) {
                $playlist = $schedule->playlist;
                $songs = $playlist->songs()->orderBy('id')->get();
                $start = Carbon::createFromFormat('H:i:s', $schedule->start_time);
                $elapsed = $start->diffInSeconds($now);

                // Calcula la duración total de la playlist
                $totalDuration = 0;
                $durations = [];
                foreach ($songs as $song) {
                    // Suponemos que cada canción dura 180 segundos si no hay campo duration
                    $dur = $song->duration ?? 180;
                    $durations[] = $dur;
                    $totalDuration += $dur;
                }

                // Si la playlist es más corta que el tiempo transcurrido, se repite
                $elapsedInLoop = $totalDuration > 0 ? $elapsed % $totalDuration : 0;

                // Determina la canción y el segundo actual
                $currentSong = null;
                $currentSecond = 0;
                $accum = 0;
                foreach ($songs as $i => $song) {
                    if ($elapsedInLoop < $accum + $durations[$i]) {
                        $currentSong = $song;
                        $currentSecond = $elapsedInLoop - $accum;
                        break;
                    }
                    $accum += $durations[$i];
                }

                $status = StationStatus::updateOrCreate(
                    ['station_id' => $station->id],
                    [
                        'playlist_id' => $playlist->id,
                        'song_id' => $currentSong ? $currentSong->id : null,
                        'song_position' => $currentSong ? $songs->search($currentSong) : 0,
                        'song_second' => $currentSecond,
                        'updated_at' => now(),
                    ]
                );

                // Guardar historial solo si la canción ha cambiado
                if (!$status->wasRecentlyCreated && $status->song_id !== ($currentSong ? $currentSong->id : null)) {
                    PlaybackHistory::create([
                        'station_id' => $station->id,
                        'playlist_id' => $playlist->id,
                        'song_id' => $currentSong ? $currentSong->id : null,
                        'played_at' => now(),
                    ]);
                }

                $this->info('[' . $station->name . '] Playlist actual: ' . $playlist->name . ($currentSong ? ' | Canción: ' . $currentSong->name . ' (segundo ' . $currentSecond . ')' : ''));
            } else {
                StationStatus::updateOrCreate(
                    ['station_id' => $station->id],
                    [
                        'playlist_id' => null,
                        'song_id' => null,
                        'song_position' => 0,
                        'song_second' => 0,
                        'updated_at' => now(),
                    ]
                );
                $this->warn('[' . $station->name . '] Sin playlist programada en este momento.');
            }
        }
    }
}
