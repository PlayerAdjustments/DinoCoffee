<?php

use App\Models\User;
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
            //? Identification
            $table->id();
            $table->string('user_matricula', 25);
            //? Contents
            $table->string('subject', 80);
            $table->tinyText('body');
            $table->tinyText('icon');
            //? Configuration
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();
            $table->timestamps();
            $table->softDeletes();
            //? Foreign Keys
            $table->foreign('user_matricula')->references('matricula')->on((new User)->getTable())->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by')->references('matricula')->on((new User)->getTable())->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by')->references('matricula')->on((new User)->getTable())->cascadeOnUpdate()->cascadeOnDelete();
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
