<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    // Una canción pertenece a una playlist (opcional)
    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    // Una canción pertenece a una estación
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    protected $fillable = [
        'name',
        'artist',
        'file',
        'playlist_id',
        'station_id',
        'jingle',
    ];
}
