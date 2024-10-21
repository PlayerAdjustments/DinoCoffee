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
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('code','75')->unique();
            $table->string('career_code',255);
            $table->decimal('passing_grade',5,2);
            $table->string('created_by',25)->nullable();
            $table->string('updated_by',25)->nullable();

            /**
             * Foreign keys, timestamps and softdeletes.
             */
            $table->foreign('career_code')->references('joined')->on('career_codes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();

            /**
             * Uniques
             */
            $table->unique(['code','career_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_plans');
    }
};
