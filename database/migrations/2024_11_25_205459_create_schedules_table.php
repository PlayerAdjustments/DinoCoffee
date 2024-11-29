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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->time('start_hour');
            $table->time('end_hour');
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();

            // Unique constraint for start and end hour combinations
            $table->unique(['start_hour', 'end_hour']);

            // Foreign keys, timestamps and softdeletes.
            $table->foreign('created_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
