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
        Schema::create('cohort_sessions', function (Blueprint $table) {
            $table->id();
            $table->boolean('completed');
            $table->foreignId('cohort_week_id');
            $table->foreignId('cohort_mentorship_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort_sessions');
    }
};
