<?php

use App\Models\Role;
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
            //? Identification
            $table->string('matricula', 25)->unique();
            $table->string('password');
            $table->string('name')->index();
            $table->string('first_lastname')->index();
            $table->string('second_lastname')->index();
            $table->char('sex')->index();
            $table->string('email')->unique();
            $table->string('phone_number', 20)->unique();
            $table->date('birthday')->index();
            //? Foreign Key
            $table->string('role', 3)->index();
            $table->foreign('role')->references('abbreviation')->on((new Role)->getTable());
            //? Optional
            $table->string('cedula_profesional', 8)->nullable()->index();
            $table->string('avatar')->default('Pengi.jpg');
            //? Configuration
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('created_by', 25)->nullable();
            $table->string('updated_by', 25)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('created_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
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
