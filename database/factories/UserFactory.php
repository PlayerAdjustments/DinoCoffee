<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /**
             * Default data
             */
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            /**
             * Custom data
             */
            'matricula' => fake()->unique()->randomNumber(8,false),
            'first_lastname' => fake()->lastName(),
            'second_lastname' => fake()->lastName(),
            'role' => Role::inRandomOrder()->limit(1)->value('abbreviation'),
            'sex' => fake()->randomElement(['M','F']),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'birthday' => fake()->date(),
            'cedula_profesional' => fake()->unique()->randomNumber(8, true),
            'avatar' => fake()->randomElement([
                'Parasauri.jpg',
                'Bronti.jpg',
                'Seri.jpg',
                'Rexxi.jpg',
                'Steggi.jpg',
                'Spyni.jpg',
                'GraduationRexxi.jpg',
                'GraduationTeddy.jpg',
                'GraduationCorgi.jpg',
                'Arcti.jpg',
                'Pengi.jpg',
                'Mooi.jpg',
                'ValentineMooi.jpg',
                'Piggi.jpg',
                'Monki.jpg'
            ]),
            'created_by' => User::inRandomOrder()->limit(1)->value('matricula'),
            'updated_by' => User::inRandomOrder()->limit(1)->value('matricula'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
