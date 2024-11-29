<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::factory()->create([
            'code' => '07:00-09:00',
            'start_hour' => '07:00:00',
            'end_hour' => '09:00:00'
        ]);

        Schedule::factory()->create([
            'code' => '09:00-11:00',
            'start_hour' => '09:00:00',
            'end_hour' => '11:00:00'
        ]);

        Schedule::factory()->create([
            'code' => '11:00-13:00',
            'start_hour' => '11:00:00',
            'end_hour' => '13:00:00'
        ]);

        Schedule::factory()->create([
            'code' => '13:00-15:00',
            'start_hour' => '13:00:00',
            'end_hour' => '15:00:00'
        ]);

        Schedule::factory(3)->create();
    }
}
