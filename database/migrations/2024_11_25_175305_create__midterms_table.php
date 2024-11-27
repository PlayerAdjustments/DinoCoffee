<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidtermsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('midterms', function (Blueprint $table) {
            $table->id();
            $table->string('midtermCode', 30)->unique();
            $table->string('abbreviation', 5)->unique();
            $table->string('fullName', 75)->index();
            $table->date('startDate')->index();
            $table->date('endDate')->index();
            $this->addAuditColumns($table);  // Llamar al método privado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midterms');
    }

    /**
     * Método para agregar las columnas de auditoría comunes.
     */
    private function addAuditColumns(Blueprint $table): void
    {
        $table->string('created_by', 25)->nullable();
        $table->string('updated_by', 25)->nullable();
        $table->foreign('created_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        $table->foreign('updated_by')->references('matricula')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        $table->timestamps();
        $table->softDeletes();
    }
}

