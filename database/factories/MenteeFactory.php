<?php

namespace Database\Factories;

use App\Models\Mentee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenteeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mentee::class;

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
