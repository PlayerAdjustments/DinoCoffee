<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            'abbreviation' => 'DEV',
            'name' => 'Developer',
        ]);

        Role::factory()->create([
            'abbreviation' => 'ADM',
            'name' => 'Administrativo',
        ]);

        Role::factory()->create([
            'abbreviation' => 'DIR',
            'name' => 'Director',
        ]);

        Role::factory()->create([
            'abbreviation' => 'COO',
            'name' => 'Coordinador',
        ]);

        Role::factory()->create([
            'abbreviation' => 'DOC',
            'name' => 'Docente',
        ]);

        Role::factory()->create([
            'abbreviation' => 'ALU',
            'name' => 'Alumno',
        ]);
    }
}
