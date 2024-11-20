<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'plan_id' => Plan::inRandomOrder()->first()->id,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'status' => fake()->randomElement(['active', 'expired', 'pending'])
        ];
    }
}
