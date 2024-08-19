<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory()->create([
            'slug' => 'desarollo-web-i',
            'name' => 'Desarrollo Web I',
            'created_by' => '00',
            'updated_by' => '00'
        ]);

        Subject::factory(35)->create();
    }
}
