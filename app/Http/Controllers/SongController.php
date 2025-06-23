<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stations = \App\Models\Station::all();
        $playlists = \App\Models\Playlist::all();
        return view('songs.create', compact('stations', 'playlists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'artist', 'playlist_id', 'station_id']);
        // Subida de archivo mp3
        if ($request->hasFile('file_upload')) {
            $data['file'] = $request->file('file_upload')->store('songs', 'public');
        } elseif ($request->file_url) {
            $data['file'] = $request->file_url;
        } else {
            $data['file'] = null;
        }
        // Obtener todos los jingles disponibles
        $jingles = Storage::files('jingles');
        if (count($jingles) > 0) {
            $jingle = $jingles[array_rand($jingles)];
        } else {
            $jingle = null;
        }
        $data['jingle'] = $jingle;
        Song::create($data);
        return redirect()->route('songs.index')->with('success', 'Canción creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $song = Song::findOrFail($id);
        $stations = \App\Models\Station::all();
        $playlists = \App\Models\Playlist::all();
        return view('songs.edit', compact('song', 'stations', 'playlists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $song = Song::findOrFail($id);
        $data = $request->only(['name', 'artist', 'playlist_id', 'station_id']);
        if ($request->hasFile('file_upload')) {
            $data['file'] = $request->file('file_upload')->store('songs', 'public');
        } elseif ($request->file_url) {
            $data['file'] = $request->file_url;
        } else {
            $data['file'] = $song->file;
        }
        // Obtener todos los jingles disponibles
        $jingles = Storage::files('jingles');
        if (count($jingles) > 0) {
            $jingle = $jingles[array_rand($jingles)];
        } else {
            $jingle = null;
        }
        $data['jingle'] = $jingle;
        $song->update($data);
        return redirect()->route('songs.index')->with('success', 'Canción actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::findOrFail($id);
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Canción eliminada correctamente');
    }
}
