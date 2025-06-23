<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\StationStatus;

class StationStatusController extends Controller
{
    public function index()
    {
        $statuses = StationStatus::with(['station', 'playlist', 'song'])->get();
        return view('station_status.index', compact('statuses'));
    }

    public function show($id)
    {
        $station = Station::findOrFail($id);
        $status = StationStatus::with(['playlist', 'song'])->where('station_id', $station->id)->first();
        return view('station_status.show', compact('status'));
    }

    public function nextSong($station_id)
    {
        $status = StationStatus::where('station_id', $station_id)->firstOrFail();
        $playlist = $status->playlist;
        $songs = $playlist->songs()->orderBy('id')->get();

        $currentPos = $status->song_position ?? 0;
        $nextPos = ($currentPos + 1) % $songs->count();
        $nextSong = $songs[$nextPos];

        $status->update([
            'song_id' => $nextSong->id,
            'song_position' => $nextPos,
            'song_second' => 0,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Canción saltada');
    }

    public function restartPlaylist($station_id)
    {
        $status = StationStatus::where('station_id', $station_id)->firstOrFail();
        $playlist = $status->playlist;
        $firstSong = $playlist->songs()->orderBy('id')->first();

        $status->update([
            'song_id' => $firstSong ? $firstSong->id : null,
            'song_position' => 0,
            'song_second' => 0,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Playlist reiniciada');
    }
}
