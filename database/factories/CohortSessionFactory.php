<?php

namespace Database\Factories;

use App\Models\CohortMentorship;
use App\Models\CohortSession;
use App\Models\CohortWeek;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortSessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CohortSession::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'completed' => $this->faker->boolean(),
            'cohort_week_id' => CohortWeek::factory(),
            'cohort_mentorship_id' => CohortMentorship::factory(),
        ];
    }
}
