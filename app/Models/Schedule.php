<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'station_id',
        'playlist_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
