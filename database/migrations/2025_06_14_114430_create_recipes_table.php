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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // A unique ID for each recipe
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to the user who created it
            $table->string('title'); // The recipe title
            $table->text('description'); // A short description
            $table->text('ingredients'); // The ingredients list
            $table->text('instructions'); // The cooking steps
            $table->timestamps(); // `created_at` and `updated_at` timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
