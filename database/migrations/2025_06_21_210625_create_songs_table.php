<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('artist')->nullable();
            $table->string('file'); // Ruta o nombre del archivo de audio
            $table->unsignedBigInteger('playlist_id')->nullable();
            $table->unsignedBigInteger('station_id');
            $table->timestamps();

            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('set null');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
