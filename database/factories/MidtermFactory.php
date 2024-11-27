<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Midterm>
 */
class MidtermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $startDate = Carbon::parse(fake()->date('Y-m-d','01-01-2016'));
        $endDate = Carbon::instance($startDate)->addYears(4);
        $user = User::inRandomOrder()->limit(1)->value('matricula');

        return [
            'midtermCode' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{4}'),
            'abbreviation' => $this->faker->unique()->lexify('???'),
            'fullName' => $this->faker->words(3, true),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'created_by' => $user,
            'updated_by' => $user

        ];
    }
}

