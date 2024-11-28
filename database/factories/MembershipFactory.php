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
            'start_date' => $startDate = collect([
                now()->subMonth(1),
                now()->subWeek(1),
                now()->subWeek(2),
                now()->subWeek(3),
                now()
            ])->random(1)->first(),
            'end_date' => $startDate->addDays(30),
            'status' => fake()->randomElement(['active', 'expired', 'pending'])
        ];
    }
}
