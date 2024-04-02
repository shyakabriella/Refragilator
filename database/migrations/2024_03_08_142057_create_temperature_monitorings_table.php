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
        Schema::create('temperature_monitorings', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Represents the day of the temperature recording
            $table->float('start_temperature'); // Temperature at 00:00:00
            $table->float('current_temperature')->nullable(); // Current temperature
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperature_monitorings');
    }
};
