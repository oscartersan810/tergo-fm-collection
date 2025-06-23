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
    Schema::create('station_statuses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('station_id')->constrained()->onDelete('cascade');
        $table->foreignId('playlist_id')->nullable()->constrained()->onDelete('set null');
        $table->foreignId('song_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamp('updated_at');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('station_statuses');
    }
};
