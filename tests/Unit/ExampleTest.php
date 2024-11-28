<?php

namespace Tests\Feature;

use App\Models\Midterm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MidtermControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_midterms()
    {
        // Crea algunos midterms de ejemplo
        Midterm::factory()->count(5)->create();

        // Realiza la solicitud GET
        $response = $this->get(route('developer.midterms.index'));

        // Verifica que la vista contiene los midterms esperados
        $response->assertStatus(200);
        $response->assertViewHas('midterms');
        $this->assertCount(5, $response->viewData('midterms'));
    }

    public function test_index_with_search_filter()
    {
        // Crea midterms con diferentes datos
        Midterm::factory()->create(['midtermCode' => 'MID001']);
        Midterm::factory()->create(['abbreviation' => 'ABR2']);
        
        // Realiza la solicitud GET con un filtro de búsqueda
        $response = $this->get(route('developer.midterms.index', ['simple-search' => 'MID']));

        // Verifica que se haya filtrado correctamente
        $response->assertStatus(200);
        $this->assertTrue($response->viewData('midterms')->contains('MID001'));
        $this->assertFalse($response->viewData('midterms')->contains('ABR2'));
    }

    public function test_index_with_trash_filter()
    {
        // Crea un midterm y elimínalo
        $midterm = Midterm::factory()->create();
        $midterm->delete();

        // Realiza la solicitud GET con filtro de elementos eliminados
        $response = $this->get(route('developer.midterms.index', ['hiddenMidtermsDeactivated' => 1]));

        // Verifica que solo se muestren los midterms eliminados
        $response->assertStatus(200);
        $this->assertTrue($response->viewData('midterms')->contains($midterm->midtermCode));
    }
}

