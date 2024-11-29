<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_hour = Carbon::parse(fake()->time('H:i','19:00'));
        $end_hour = $start_hour->copy()->addHour(2);
        return [
            'code' =>  $start_hour->format('H:i').'-'.$end_hour->format('H:i'),
            'start_hour' => $start_hour,
            'end_hour' => $end_hour
        ];
    }
}
