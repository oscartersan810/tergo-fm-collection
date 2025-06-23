<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    // Propiedades que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'station_id',
        'time_slot',
        'description',
    ];

    // Una playlist pertenece a una estación
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    // Una playlist tiene muchas canciones
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
