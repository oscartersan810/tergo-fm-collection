<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('station_statuses', function ($table) {
        $table->integer('song_position')->default(0); // posición en la playlist
        $table->integer('song_second')->default(0);   // segundo actual de la canción
    });
}

public function down()
{
    Schema::table('station_statuses', function ($table) {
        $table->dropColumn(['song_position', 'song_second']);
    });
}
};
