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
        Schema::create('career_codes', function (Blueprint $table) {
            $table->id();
            $table->string('joined', 255)->unique();
            $table->string('career_abbreviation', 3)->index();
            $table->integer('code')->index();
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();

            /**
             * Multicolumn unique constraints.
             */
            $table->unique(['career_abbreviation', 'code']);

            /**
             * Foreign keys, timestamps and softdeletes.
             */
            $table->foreign('career_abbreviation')->references('abbreviation')->on('careers')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('career_codes');
    }
};
