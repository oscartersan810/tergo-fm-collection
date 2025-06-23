<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    // Propiedad para asignación masiva
    protected $fillable = [
        'name',
        'type',
    ];

    // Una estación tiene muchas playlists
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    // Una estación tiene muchas canciones
    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function playbackHistories()
    {
        return $this->hasMany(\App\Models\PlaybackHistory::class);
    }
}
