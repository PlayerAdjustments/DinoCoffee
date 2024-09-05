<?php

namespace Database\Seeders;

use App\Models\StudyPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studyplans = [
            'RVOE no. 1232/2020' => 'IMK-25',
            'RVOE no. 1458/2021' => 'IIL-32',
            'RVOE no. 1458/2016' => 'IIL-32',
            'RVOE no. 2034/2019' => 'IEP-48',
            'RVOE no. 20221849/2022' => 'IBM-33',
            'RVOE no. 1656/2017' => 'IBM-33',
            'RVOE no. 1815/2019' => 'IAM-35',
            'RVOE no. 2126/2021' => 'DTS-99',
            'RVOE no. 2126/2017' => 'DTS-99',
            'RVOE no. 285/2023' => 'IEP-285',
        ];

        /**
         * Engineering StudyPlans
         */
        foreach($studyplans as $rvoe => $career_code){
            StudyPlan::factory()->create([
                'slug' => $rvoe,
                'code' => $rvoe,
                'career_code' => $career_code,
                'passing_grade' => 60
            ]);
        }

        StudyPlan::factory(80)->create();
    }
}
