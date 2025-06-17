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
        Schema::table('comments', function (Blueprint $table) {
            // 1. Drop the old recipe_id foreign key
            $table->dropForeign(['recipe_id']);
            $table->dropColumn('recipe_id');

            // 2. Add the new polymorphic columns after user_id
            $table->morphs('commentable'); // This creates `commentable_id` and `commentable_type`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
