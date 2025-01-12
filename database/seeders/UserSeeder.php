<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Default developer user
         */
        User::create([
            'name' => 'Dino',
            'first_lastname' => 'Code',
            'second_lastname' => 'Advisor',
            'email' => 'dinoCodeAdvisor@gmail.com',
            'remember_token' => Str::random(10),
            'password' => 'Dino',
            'matricula' => '00',
            'role' => 'DEV',
            'sex' => 'M',
            'phone_number' => '+52 9993681035',
            'birthday' => '2004-06-05',
            'cedula_profesional' => null,
            'created_by' => null,
            'updated_by' => null,
        ]);

        /**
         * Creating 50 random users.
         */
        User::factory(50)->create();
    }
}
