<?php

namespace Database\Factories;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Referral>
 */
class ReferralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['active', 'active', 'pending']);
        $totalEarned = $status === 'active' ? fake()->randomFloat(2, 10, 100) : 0.00;

        return [
            'user_id' => User::factory(),
            'referred_name' => fake()->name(),
            'registered_at' => fake()->dateTimeBetween('-6 months', '-1 day')->format('Y-m-d'),
            'status' => $status,
            'commission_rate' => 20.00,
            'total_earned' => $totalEarned,
        ];
    }
}
