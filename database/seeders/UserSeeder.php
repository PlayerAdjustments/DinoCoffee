<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Inputting my user on the seeder.
         */
        User::factory()->create([
            'name' => "Modelo's",
            'first_lastname' => 'Origin',
            'second_lastname' => 'System',
            'email' => 'originSystem@gmail.com',
            'remember_token' => Str::random(10),
            'password' => 'Prueba',
            'matricula' => "00",
            'role' => 'DEV',
            'sex' => 'M',
            'phone_number' => '+52 9993681030',
            'birthday' => '2004-06-05',
            'cedula_profesional' => null,
            'created_by' => null,
            'updated_by' => null,
        ]);

        User::factory()->create([
            'name' => "Dino",
            'first_lastname' => 'Plushie',
            'second_lastname' => 'Developer',
            'email' => 'dinoCodeAdvisor@gmail.com',
            'remember_token' => Str::random(10),
            'password' => 'Prueba',
            'matricula' => "01",
            'role' => 'DEV',
            'sex' => 'M',
            'phone_number' => '+52 9993681035',
            'birthday' => '2004-06-05',
            'cedula_profesional' => null,
            'created_by' => "00",
            'updated_by' => "00",
        ]);

        User::factory(50)->create();
    }
}
