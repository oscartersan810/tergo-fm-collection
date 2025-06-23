<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::with('songs')->get();
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stations = \App\Models\Station::all();
        return view('playlists.create', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $playlist = Playlist::create($request->only(['name', 'station_id', 'time_slot', 'description']));
        return redirect()->route('playlists.index')->with('success', 'Playlist creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $playlist = Playlist::with('songs')->findOrFail($id);
        return view('playlists.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $playlist = Playlist::findOrFail($id);
        $stations = \App\Models\Station::all();
        return view('playlists.edit', compact('playlist', 'stations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->update($request->only(['name', 'station_id', 'time_slot', 'description']));
        return redirect()->route('playlists.index')->with('success', 'Playlist actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();
        return redirect()->route('playlists.index')->with('success', 'Playlist eliminada correctamente');
    }
}
