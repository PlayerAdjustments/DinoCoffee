<?php

namespace Database\Seeders;

use App\Models\Midterm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MidtermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Midterm::factory(2)->create();
    }
}
