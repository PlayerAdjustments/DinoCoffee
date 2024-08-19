<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_matricula' => User::inRandomOrder()->limit(1)->value('matricula'),
            'subject' => fake()->text(20),
            'body' => fake()->text(30),
            'icon' => fake()->randomElement(['Rexxi_cheer.gif','Seri_Confused.png','Seri_Glasses.png','Seri_Reading.png']),
            'created_by' => User::inRandomOrder()->limit(1)->value('matricula'),
            'updated_by' => User::inRandomOrder()->limit(1)->value('matricula'),
        ];
    }
}
