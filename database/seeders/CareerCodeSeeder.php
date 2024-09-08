<?php

namespace Database\Seeders;

use App\Models\CareerCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $career_codes = [
            'DTS' => [99],
            'IMK' => [25],
            'IAM' => [35],
            'IBM' => [33],
            'IIL' => [32],
            'IEP' => [48, 285]
        ];
        /**Engineering CareerCode */
        foreach ($career_codes as $career_abbreviation => $codes) {
            foreach ($codes as $code) {
                CareerCode::factory()->create([
                    'joined' => $career_abbreviation . '-' . $code,
                    'career_abbreviation' => $career_abbreviation,
                    'code' => $code,
                    'created_by' => '00'
                ]);
            }
        }

        /**
         * Random CareerCodes 
         */
        CareerCode::factory(30)->create();
    }
}
