<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlaybackHistory;
use App\Models\Station;
use App\Models\Playlist;
use App\Models\Song;

class PlaybackHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = PlaybackHistory::with(['station', 'playlist', 'song']);

        if ($request->station_id) {
            $query->where('station_id', $request->station_id);
        }
        if ($request->playlist_id) {
            $query->where('playlist_id', $request->playlist_id);
        }
        if ($request->song_id) {
            $query->where('song_id', $request->song_id);
        }
        if ($request->from) {
            $query->where('played_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->where('played_at', '<=', $request->to);
        }

        $histories = $query->orderByDesc('played_at')->paginate(20);

        $stations = Station::all();
        $playlists = Playlist::all();
        $songs = Song::all();

        return view('playback_history.index', compact('histories', 'stations', 'playlists', 'songs'));
    }

    public function export(Request $request)
    {
        $query = PlaybackHistory::with(['station', 'playlist', 'song']);

        if ($request->station_id) {
            $query->where('station_id', $request->station_id);
        }
        if ($request->playlist_id) {
            $query->where('playlist_id', $request->playlist_id);
        }
        if ($request->song_id) {
            $query->where('song_id', $request->song_id);
        }
        if ($request->from) {
            $query->where('played_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->where('played_at', '<=', $request->to);
        }

        $histories = $query->orderByDesc('played_at')->get();

        $csv = "Estación,Playlist,Canción,Fecha y hora\n";
        foreach ($histories as $h) {
            $csv .= '"' . ($h->station->name ?? '-') . '","' . ($h->playlist->name ?? '-') . '","' . ($h->song->name ?? '-') . '","' . $h->played_at . "\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="historial_reproduccion.csv"');
    }
}
