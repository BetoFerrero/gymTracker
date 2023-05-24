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
        Schema::table('Records', function (Blueprint $table) {
            $table->foreignUuid('routine_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Records', function (Blueprint $table) {
            if (schema::hasColumn('routine_id')){
                $table->dropColumn('routine_id');   
            };
           
        });
    }
};
