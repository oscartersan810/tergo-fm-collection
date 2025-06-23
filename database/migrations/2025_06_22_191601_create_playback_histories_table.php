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
    Schema::create('playback_histories', function ($table) {
        $table->id();
        $table->foreignId('station_id')->constrained()->onDelete('cascade');
        $table->foreignId('playlist_id')->nullable()->constrained()->onDelete('set null');
        $table->foreignId('song_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamp('played_at');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playback_histories');
    }
};
