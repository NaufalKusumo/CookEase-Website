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
        Schema::table('recipes', function (Blueprint $table) {
            // Add a column to store the path to the recipe photo
            $table->string('photo')->nullable()->after('description');

            // Add a column for servings
            $table->string('servings')->nullable()->after('photo');

            // Add a column for the cooking time
            $table->string('cook_time')->nullable()->after('servings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            //
        });
    }
};
