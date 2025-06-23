<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Station;
use App\Models\Playlist;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with(['station', 'playlist'])->get();
        return view('shedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stations = Station::all();
        $playlists = Playlist::all();
        return view('shedules.create', compact('stations', 'playlists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Schedule::create($request->only(['station_id', 'playlist_id', 'day_of_week', 'start_time', 'end_time']));
        return redirect()->route('schedules.index')->with('success', 'Programación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $schedule = Schedule::with(['station', 'playlist'])->findOrFail($id);
        return view('shedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $stations = Station::all();
        $playlists = Playlist::all();
        return view('shedules.edit', compact('schedule', 'stations', 'playlists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->only(['station_id', 'playlist_id', 'day_of_week', 'start_time', 'end_time']));
        return redirect()->route('schedules.index')->with('success', 'Programación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Programación eliminada correctamente');
    }
}
