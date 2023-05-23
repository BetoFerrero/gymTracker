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
        Schema::create('routine_exercise', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('routine_id')->constrained('routines','id')->cascadeOnDelete();
            $table->foreignUuid('exercise_id')->constrained('exercises','id')->cascadeOnDelete();
            $table->integer('Order');
            $table->Integer('sets')->default(4);
            $table->Integer('reps')->default(10);
            $table->Integer('rir')->default(0);
            $table->timestamps();//eliminable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routine_exercise');
    }
};
