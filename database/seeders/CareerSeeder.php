<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**Engineering career */
        Career::factory()->create([
            'abbreviation' => 'DTS',
            'name' => 'Ingeniería en desarrollo de tecnología y software',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 3875
            'color' => 'sky',
            'created_by' => '00'
        ]);

        Career::factory()->create([
            'abbreviation' => 'IAM',
            'name' => 'Ingeniería automotríz',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 4571
            'color' => 'red',
            'created_by' => '00'
        ]);

        Career::factory()->create([
            'abbreviation' => 'IBM',
            'name' => 'Ingeniería biomédica',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 5291
            'color' => 'lime',
            'created_by' => '00'
        ]);

        Career::factory()->create([
            'abbreviation' => 'IEP',
            'name' => 'Ingeniería en energía y petroleo',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 5153
            'color' => 'yellow',
            'created_by' => '00'
        ]);

        Career::factory()->create([
            'abbreviation' => 'IMK',
            'name' => 'Ingeniería en mecatrónica',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 4883
            'color' => 'orange',
            'created_by' => '00'
        ]);

        Career::factory()->create([
            'abbreviation' => 'IIL',
            'name' => 'Ingeniería industrial logística',
            'school_abbreviation' => 'ING',
            'coordinador_matricula' => '00', //Should be 460
            'color' => 'pink',
            'created_by' => '00'
        ]);

        Career::factory(30)->create();
    }
}
