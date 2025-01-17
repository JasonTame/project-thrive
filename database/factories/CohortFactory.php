<?php

namespace Database\Factories;

use App\Models\Cohort;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cohort::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $start_at = $this->faker->date();

        return [
            'num_weeks' => 12,
            'start_at' => $start_at,
            'end_at' => date('Y-m-d', strtotime($start_at.' + 12 weeks')),
        ];
    }
}
