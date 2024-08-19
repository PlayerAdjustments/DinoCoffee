<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->text('75');

        return [
            'slug' => $name,
            'name' => $name,
            'created_by' => User::inRandomOrder()->limit(1)->value('matricula'),
            'updated_by' => User::inRandomOrder()->limit(1)->value('matricula'),
        ];
    }
}
