<?php

namespace Database\Seeders;

use App\Models\Midterm;
use Illuminate\Database\Seeder;

class MidtermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Midterm::factory(5)->create();
    }
}
