<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\CohortWeek;
use App\Models\Mentee;
use App\Models\Mentor;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cohort = Cohort::factory()->create();

        CohortWeek::factory()
            ->count($cohort->num_weeks)
            ->for($cohort)
            ->create([
                'week_number' => function () {
                    static $week = 1;

                    return $week++;
                },
            ]);

        $mentees = Mentee::factory()->count(10)->create();
        $mentors = Mentor::factory()->count(10)->create();

        $mentees->each(function ($mentee) use ($cohort) {
            $mentee->cohorts()->attach($cohort);
        });

        $mentors->each(function ($mentor) use ($cohort) {
            $mentor->cohorts()->attach($cohort);
        });
    }
}
