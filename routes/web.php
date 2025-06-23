<?php

use App\Http\Controllers\PlaybackHistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\StationStatusController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('stations', StationController::class);
Route::resource('playlists', PlaylistController::class);
Route::resource('songs', SongController::class);
Route::resource('schedules', \App\Http\Controllers\ScheduleController::class);

Route::get('/estados', [StationStatusController::class, 'index'])->name('station_status.index');

Route::get('/estados/{station}', [StationStatusController::class, 'show'])->name('station_status.show');

Route::post('/estaciones/{station}/next', [StationStatusController::class, 'nextSong'])->name('station_status.next');
Route::post('/estaciones/{station}/restart', [StationStatusController::class, 'restartPlaylist'])->name('station_status.restart');

Route::get('/historial/export', [PlaybackHistoryController::class, 'export'])->name('playback_history.export');