<?php

namespace Database\Factories;

use App\Models\Cohort;
use App\Models\CohortWeek;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortWeekFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CohortWeek::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'week_number' => $this->faker->numberBetween(1, 12),
            'cohort_id' => Cohort::factory(),
        ];
    }
}
