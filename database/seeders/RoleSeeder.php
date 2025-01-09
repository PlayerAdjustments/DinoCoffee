<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "abbreviation" => 'DEV',
                "name" => "Developer"
            ],
            [
                "abbreviation" => 'ADM',
                "name" => "Administrativo"
            ],
            [
                "abbreviation" => 'DIR',
                "name" => "Director"
            ],
            [
                "abbreviation" => 'COO',
                "name" => "Coordinador"
            ],
            [
                "abbreviation" => 'DOC',
                "name" => "Docente"
            ],
            [
                "abbreviation" => 'ALU',
                "name" => "Alumno"
            ],
        ];

        foreach($roles as $role)
        {
            Role::create($role);
        }
    }
}
