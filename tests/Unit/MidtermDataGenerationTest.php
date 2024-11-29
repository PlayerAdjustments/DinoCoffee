<?php

namespace Tests\Unit;

use App\Http\Requests\Midterm\StoreMidtermRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Carbon\Carbon;

class MidtermDataGenerationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Simular un usuario autenticado
        Auth::shouldReceive('user')
            ->andReturn((object)['matricula' => '12345', 'role' => 'ADM']);
    }

    /**
     * Prueba original: Generar datos de midterm.
     */
    public function test_generate_midterm_data()
    {
        $data = StoreMidtermRequest::generateMidtermData('2024-01-01', '2024-01-31', 'ABC');

        $this->assertArrayHasKey('midtermCode', $data);
        $this->assertArrayHasKey('created_by', $data);
        $this->assertArrayHasKey('updated_by', $data);
        $this->assertEquals('12345', $data['created_by']);
        $this->assertEquals('12345', $data['updated_by']);
        $this->assertEquals('ABC-2024-01-01-2024-01-31', $data['midtermCode']);
    }

    /**
     * Generar datos con fechas no válidas.
     */
    public function test_generate_midterm_data_with_invalid_dates()
    {
        $this->expectException(\Exception::class);
        StoreMidtermRequest::generateMidtermData('invalid-date', '2024-01-31', 'ABC');
    }    

}



