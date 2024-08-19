<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CareerCode>
 */
class CareerCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $career_abbreviation = Career::inRandomOrder()->where('school_abbreviation', '!=', 'ING')->value('abbreviation');
        $code = fake()->numberBetween(0,255);

        return [
            'joined' => $career_abbreviation.'-'.$code,
            'career_abbreviation' => $career_abbreviation,
            'code' => $code
        ];
    }
}
