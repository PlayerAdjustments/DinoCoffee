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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('abbreviation', 3)->unique();
            $table->string('name', 255)->index();
            $table->string('director_matricula', 25)->index();
            $table->string('color', 25);
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();
            /**
             * Foreign keys, timestamps and softdeletes.
             */
            $table->foreign('director_matricula')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('schools');
    }
};
