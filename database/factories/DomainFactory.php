<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'domain_name' => fake()->unique()->domainName(),
            'status' => fake()->randomElement(['active', 'active', 'active', 'expired']), // 75% active
            'is_locked' => fake()->boolean(80), // 80% locked
            'auto_renew' => fake()->boolean(60), // 60% auto-renew
            'dns_type' => fake()->randomElement(['DNS Personalizado', 'Cloudflare DNS', 'Google DNS']),
            'price' => fake()->randomElement([9.99, 12.99, 14.99, 29.99]),
            'expires_at' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];
    }
}
