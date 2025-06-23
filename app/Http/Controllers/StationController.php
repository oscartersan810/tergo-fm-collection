<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stations = Station::all();
        return view('stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $station = Station::create($request->only(['name', 'type']));
        return redirect()->route('stations.index')->with('success', 'Estación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $station = Station::with(['playlists', 'songs'])->findOrFail($id);
        return view('stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $station = Station::findOrFail($id);
        return view('stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $station = Station::findOrFail($id);
        $station->update($request->only(['name', 'type']));
        return redirect()->route('stations.index')->with('success', 'Estación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $station = Station::findOrFail($id);
        $station->delete();
        return redirect()->route('stations.index')->with('success', 'Estación eliminada correctamente');
    }
}
