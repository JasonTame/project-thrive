<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\CohortMentorship;
use Illuminate\Database\Seeder;

class CohortMentorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cohort = Cohort::firstOrFail();

        $mentors = $cohort->mentors;
        $mentees = $cohort->mentees;

        // Ensure we don't try to create more pairs than possible
        $pairsToCreate = min(
            min($mentors->count(), $mentees->count()), // Can't create more pairs than the smaller group
            max($mentors->count(), $mentees->count()) * 0.7 // Create pairs for ~70% of the larger group
        );

        // Shuffle both collections
        $shuffledMentors = $mentors->shuffle();
        $shuffledMentees = $mentees->shuffle();

        // Create the pairs
        for ($i = 0; $i < $pairsToCreate; $i++) {
            CohortMentorship::create([
                'cohort_id' => $cohort->id,
                'mentor_id' => $shuffledMentors[$i]->id,
                'mentee_id' => $shuffledMentees[$i]->id,
            ]);
        }
    }
}
