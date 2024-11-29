<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CreateMidtermsTableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que la tabla 'midterms' se haya creado correctamente.
     */
    public function test_migration_creates_midterms_table()
    {
        $this->artisan('migrate')->run();

        $this->assertTrue(Schema::hasTable('midterms'));
    }

    /**
     * Verifica que las columnas requeridas existan en la tabla 'midterms'.
     */
    public function test_midterms_table_has_required_columns()
    {
        $this->artisan('migrate')->run();

        $columns = ['id', 'midtermCode', 'fullName', 'startDate', 'endDate', 'created_at', 'updated_at'];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('midterms', $column), "Falta la columna: $column");
        }
    }

    /**
     * Verifica que la tabla 'midterms' se elimine al hacer rollback.
     */
    public function test_migration_drops_midterms_table_on_rollback()
    {
        $this->artisan('migrate')->run();
        $this->assertTrue(Schema::hasTable('midterms'));

        $this->artisan('migrate:rollback')->run();
        $this->assertFalse(Schema::hasTable('midterms'));
    }
}


