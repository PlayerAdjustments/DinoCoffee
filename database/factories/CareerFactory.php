<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Career>
 */
class CareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'abbreviation' => fake()->unique()->lexify('???'),
            'name' => fake()->text(35),
            'school_abbreviation' => School::inRandomOrder()->limit(1)->value('abbreviation'),
            'coordinador_matricula' => User::inRandomOrder()->where('role','COO')->limit(1)->value('matricula'),
            'semester_duration' => fake()->randomElement([8,10]),
            'color' => fake()->randomElement(['purple','blue','red','amber','yellow','lime','violet','teal','rose','green','fuchsia','sky','pink','emerald','cyan','orange','indigo','slate','gray']),
            'created_by' => User::inRandomOrder()->limit(1)->value('matricula'),
            'updated_by' => User::inRandomOrder()->limit(1)->value('matricula'),
        ];
    }
}
