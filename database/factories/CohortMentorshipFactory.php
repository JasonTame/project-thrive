<?php

namespace Database\Factories;

use App\Models\CohortMentorship;
use App\Models\Mentee;
use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CohortMentorshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CohortMentorship::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'mentor_id' => Mentor::factory(),
            'mentee_id' => Mentee::factory(),
        ];
    }
}
