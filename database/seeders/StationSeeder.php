<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
            ['name' => 'Megatrix FM', 'type' => 'playlist'],
            ['name' => 'Ator FM Beta', 'type' => 'continuous'],
            ['name' => 'Ator FM V1', 'type' => 'playlist'],
            ['name' => 'Ator FM V2', 'type' => 'playlist'],
            ['name' => 'Spectrum FM', 'type' => 'playlist'],
            ['name' => 'Ator FM V3', 'type' => 'playlist'],
            ['name' => 'Rota FM V1', 'type' => 'playlist'],
            ['name' => 'Ator FM V4', 'type' => 'playlist'],
            ['name' => 'Ator FM V5', 'type' => 'playlist'],
            ['name' => 'Rota FM V2', 'type' => 'playlist'],
            ['name' => 'Ator FM V6', 'type' => 'playlist'],
            ['name' => 'Tergo FM', 'type' => 'playlist'],
        ];
        foreach ($stations as $station) {
            \App\Models\Station::create($station);
        }
    }
}
