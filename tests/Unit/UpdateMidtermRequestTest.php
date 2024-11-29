<?php

namespace Tests\Unit;

use App\Http\Requests\Midterm\UpdateMidtermRequest;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateMidtermRequestTest extends TestCase
{
    public function test_update_request_rules()
    {
        // Simulamos que el usuario está autenticado con un ID válido
        Auth::shouldReceive('user')->andReturn((object)['matricula' => '12345', 'role' => 'ADM']);

        $request = new UpdateMidtermRequest();

        $rules = $request->rules();

        // Verifica las reglas de 'midtermCode'
        $this->assertArrayHasKey('midtermCode', $rules);
        $this->assertContains('required', $rules['midtermCode']);
        $this->assertContains('string', $rules['midtermCode']);
        $this->assertContains('max:255', $rules['midtermCode']);
        
        // Verifica que 'midtermCode' contenga un objeto Unique
        $uniqueRule = collect($rules['midtermCode'])->first(function ($rule) {
            return $rule instanceof \Illuminate\Validation\Rules\Unique;
        });
        $this->assertNotNull($uniqueRule);

        // Verifica las reglas de 'abbreviation'
        $this->assertArrayHasKey('abbreviation', $rules);
        $this->assertContains('required', $rules['abbreviation']);
        $this->assertContains('string', $rules['abbreviation']);
        $this->assertContains('max:3', $rules['abbreviation']);
        $this->assertTrue(collect($rules['abbreviation'])->contains(function ($rule) {
            return is_callable($rule);
        }));

        // Verifica las reglas de 'startDate'
        $this->assertArrayHasKey('startDate', $rules);
        $this->assertStringContainsString('required', $rules['startDate']);
        $this->assertStringContainsString('date', $rules['startDate']);
        $this->assertStringContainsString('before:endDate', $rules['startDate']);
        
        // Verifica las reglas de 'endDate'
        $this->assertArrayHasKey('endDate', $rules);
        $this->assertStringContainsString('required', $rules['endDate']);
        $this->assertStringContainsString('date', $rules['endDate']);
        $this->assertStringContainsString('after:startDate', $rules['endDate']);
    }
}



