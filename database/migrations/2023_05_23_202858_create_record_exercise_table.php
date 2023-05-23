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
        Schema::create('record_exercise', function (Blueprint $table) {
            $table->timestamps();
            $table->uuid()->primary();
            $table->foreignUuid('records_uuid')->constrained('records','uuid')->cascadeOnDelete();
            $table->foreignUuid('exercise_uuid')->constrained('exercises','uuid')->cascadeOnDelete();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('reps')->nullable();
            $table->unsignedInteger('time')->nullable();
            $table->unsignedinteger('rpe')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_set');
    }
};
