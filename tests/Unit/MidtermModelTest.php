<?php

namespace Tests\Unit;

use App\Models\Midterm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MidtermModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_midterm_creation()
    {
        $midterm = Midterm::factory()->create([
            'midtermCode' => 'MID001',
            'abbreviation' => 'ABC',
            'fullName' => 'Midterm Full Name',
            'startDate' => '2024-01-01',
            'endDate' => '2024-01-31',
        ]);

        $this->assertDatabaseHas('midterms', [
            'midtermCode' => 'MID001',
            'abbreviation' => 'ABC',
            'fullName' => 'Midterm Full Name',
        ]);
    }

    public function test_midterm_soft_delete()
    {
        $midterm = Midterm::factory()->create();
        $midterm->delete();

        $this->assertSoftDeleted('midterms', ['id' => $midterm->id]);
    }

    public function test_midterm_restore()
    {
        $midterm = Midterm::factory()->create();
        $midterm->delete();
        $midterm->restore();

        $this->assertDatabaseHas('midterms', ['id' => $midterm->id]);
    }

    public function test_midterm_code_mutator()
    {
        $midterm = new Midterm(['midtermCode' => ' MID001 ']);
        $this->assertEquals('MID001', $midterm->midtermCode);
    }

    public function test_midterm_abbreviation_mutator()
    {
        $midterm = new Midterm(['abbreviation' => ' abc ']);
        $this->assertEquals('ABC', $midterm->abbreviation);
    }
}
