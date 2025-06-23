<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaybackHistory extends Model
{
    protected $fillable = ['station_id', 'playlist_id', 'song_id', 'played_at'];

    public function station() { return $this->belongsTo(Station::class); }
    public function playlist() { return $this->belongsTo(Playlist::class); }
    public function song() { return $this->belongsTo(Song::class); }
}
