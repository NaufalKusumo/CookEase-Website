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
        Schema::table('tips', function (Blueprint $table) {
            // First, rename the existing 'description' column to 'content'
            $table->renameColumn('description', 'content');

            // Then, add a new 'description' column after the 'title'
            $table->text('description')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tips', function (Blueprint $table) {
            //
        });
    }
};
