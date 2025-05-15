<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'goal_amount' => fake()->randomFloat(2, 100, 10000),
            'current_amount' => fake()->randomFloat(2, 0, 10000),
            'start_date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'end_date' => fake()->dateTimeBetween('+1 month', '+3 months'),
            'user_id' => User::inRandomOrder()->value('id'),
            'status' => fake()->randomElement(Status::cases())->value,
        ];
    }
}
