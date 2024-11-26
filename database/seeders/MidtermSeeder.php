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

        Midterm::factory()->create([
            'midtermCode' => 'YEI4553',
            'abbreviation' => 'AWG',
            'fullName' => 'Quaerat sint et',
            'startDate' => '1988-08-28',
            'endDate' => '1992-08-28',
            'created_by' => '00', // Matricula del usuario
            'updated_by' => '01', // Matricula del usuario
        ]);

        Midterm::factory()->create([
            'midtermCode' => 'HGG7053',
            'abbreviation' => 'VZP',
            'fullName' => 'Iusto aliquid sed',
            'startDate' => '1973-03-12',
            'endDate' => '1977-03-12',
            'created_by' => '00', // Matricula del usuario
            'updated_by' => '01', // Matricula del usuario
        ]);
    }
}

