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
        Schema::create('cohort_weeks', function (Blueprint $table) {
            $table->id();
            $table->integer('week_number');
            $table->foreignId('cohort_id');
            $table->timestamps();

            $table->unique(['cohort_id', 'week_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cohort_weeks');
    }
};
