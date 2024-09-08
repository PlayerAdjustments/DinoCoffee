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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            /**
             * Custom data
             */
            $table->string('matricula', 25)->unique();
            $table->string('name')->index();
            $table->string('first_lastname')->index();
            $table->string('second_lastname')->index();
            $table->string('role', 3)->index();
            $table->foreign('role')->references('abbreviation')->on('roles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->char('sex')->index();
            $table->string('phone_number', 15)->unique();
            $table->date('birthday')->index();
            $table->string('cedula_profesional', 8)->nullable()->index();
            $table->string('avatar')->default('Monki.jpg');
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();
            /**
             * Default values
             */
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
