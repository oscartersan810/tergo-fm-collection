<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $songs = [
            ['name' => 'Song 1', 'artist' => 'Artist 1', 'file' => 'song1.mp3', 'playlist_id' => 1, 'station_id' => 1],
            ['name' => 'Song 2', 'artist' => 'Artist 2', 'file' => 'song2.mp3', 'playlist_id' => 1, 'station_id' => 1],
            ['name' => 'Song 3', 'artist' => 'Artist 3', 'file' => 'song3.mp3', 'playlist_id' => 2, 'station_id' => 1],
            ['name' => 'Song 4', 'artist' => 'Artist 4', 'file' => 'song4.mp3', 'playlist_id' => 4, 'station_id' => 2],
            ['name' => 'Song 5', 'artist' => 'Artist 5', 'file' => 'song5.mp3', 'playlist_id' => null, 'station_id' => 2],
        ];
        foreach ($songs as $song) {
            \App\Models\Song::create($song);
        }
    }
}
