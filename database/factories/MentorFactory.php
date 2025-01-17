<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MentorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mentor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'approved' => $this->faker->boolean(),
            'bio' => $this->faker->paragraph(),
            'user_id' => User::factory(),
        ];
    }
}
