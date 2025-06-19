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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Who submitted the report
            
            // Polymorphic relationship to the content being reported
            $table->morphs('reportable'); // -> reportable_id, reportable_type
            
            $table->string('reason'); // e.g., 'Spam', 'Inappropriate', 'Misleading'
            $table->text('details')->nullable(); // User's optional detailed explanation
            $table->string('status')->default('pending'); // 'pending', 'resolved', 'dismissed'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
