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
        $startDate = Carbon::parse($this->faker->date('Y-m-d', '01-01-2016'));
        $endDate = Carbon::instance($startDate)->addYears(4);
        $user = User::inRandomOrder()->limit(1)->value('matricula');
        $abbreviation = strtoupper($this->faker->lexify('???'));

        return [
            'midtermCode' => $abbreviation.'-'.$startDate->toDateString().'-'.$endDate->toDateString(),
            'abbreviation' => $abbreviation,
            'fullName' => $this->faker->words(3, true),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'created_by' => $user,
            'updated_by' => $user

        ];
    }
}

