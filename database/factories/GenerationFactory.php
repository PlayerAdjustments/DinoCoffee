<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Generation>
 */
class GenerationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = Carbon::parse(fake()->date('Y-m-d','01-01-2016'));
        $end_date = Carbon::instance($start_date)->addYears(4);
        return [
            'code' =>  $start_date->year.'-'.$end_date->year,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
    }
}
