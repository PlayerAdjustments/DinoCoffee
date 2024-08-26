<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            NotificationSeeder::class,
            SchoolSeeder::class,
            CareerSeeder::class,
            CareerCodeSeeder::class,
            SubjectSeeder::class,
            GenerationSeeder::class,
            StudyPlanSeeder::class,
        ]);
    }
}
