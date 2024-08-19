<?php

namespace Database\Seeders;

use App\Models\Generation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Generation::factory()->create([
            'code' => '2023-2027',
            'start_date' => '2023-08-01',
            'end_date' => '2027-08-01'
        ]);

        Generation::factory()->create([
            'code' => '2022-2026',
            'start_date' => '2022-08-01',
            'end_date' => '2026-08-01'
        ]);

        Generation::factory()->create([
            'code' => '2021-2025',
            'start_date' => '2021-08-01',
            'end_date' => '2025-08-01'
        ]);

        Generation::factory()->create([
            'code' => '2020-2024',
            'start_date' => '2020-08-01',
            'end_date' => '2024-08-01'
        ]);

        Generation::factory(2)->create();
    }
}
