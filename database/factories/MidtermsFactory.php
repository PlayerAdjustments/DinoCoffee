<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MidtermsFactory extends Factory
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
            'midtermCode' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{4}'),
            'abbreviation' => $this->faker->unique()->lexify('???'),
            'fullName' => $this->faker->words(3, true),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'created_by' => $this->faker->randomDigitNotNull(),
            'updated_by' => $this->faker->randomDigitNotNull(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
