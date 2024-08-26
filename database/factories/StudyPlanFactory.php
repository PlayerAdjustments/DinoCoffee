<?php

namespace Database\Factories;

use App\Models\CareerCode;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyPlan>
 */
class StudyPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = 'RVOE no.'.fake()->numberBetween(0,255).'/'.fake()->year();

        return [
            'slug' => $code,
            'code' => $code,
            'career_code' => CareerCode::inRandomOrder()->limit(1)->whereNotIn('career_abbreviation',['DTS','IEP','IMK','IAM','IBM','IIL'])->value('joined'),
            'passing_grade' => 60,
            'created_by' => User::inRandomOrder()->limit(1)->value('matricula'),
            'updated_by' => User::inRandomOrder()->limit(1)->value('matricula'),
        ];
    }
}
