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
        Schema::create('notifications', function (Blueprint $table) {
            /**
             * Main columns
             */
            $table->id();
            $table->string('user_matricula', 25);
            $table->string('subject', 80);
            $table->tinyText('body');
            $table->tinyText('icon');
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();

            /**
             * Foreign keys, timestamps and softdeletes.
             */
            $table->foreign('user_matricula')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('notifications');
    }
};
