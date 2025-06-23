<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playlists = [
            ['name' => 'Mañanas Megatrix', 'station_id' => 1, 'time_slot' => '08:00-12:00'],
            ['name' => 'Tardes Megatrix', 'station_id' => 1, 'time_slot' => '12:00-18:00'],
            ['name' => 'Noches Megatrix', 'station_id' => 1, 'time_slot' => '18:00-00:00'],
            ['name' => 'Ator Beta 24h', 'station_id' => 2, 'time_slot' => null],
            ['name' => 'Mañanas Ator V1', 'station_id' => 3, 'time_slot' => '08:00-12:00'],
        ];
        foreach ($playlists as $playlist) {
            \App\Models\Playlist::create($playlist);
        }
    }
}
