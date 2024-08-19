<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::factory()->create([
            'abbreviation' => 'ING',
            'name' => "Escuela de ingeniería.",
            'director_matricula' => '00', //Should be 4176
            'color' => 'sky',
            'created_by' => null,
            'updated_by' => null,
        ]);

        School::factory(10)->create();
    }
}
