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
            $table->string('midtermCode', 255)->unique();
            $table->string('abbreviation', 3);
            $table->string('fullName', 75)->index();
            $table->date('startDate')->index();
            $table->date('endDate')->index();
            $this->addAuditColumns($table);  // Llamar al método privado
            $table->unique(['startDate','endDate']);
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

