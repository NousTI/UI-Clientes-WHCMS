<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['vps', 'dedicado', 'compartido'];
        $type = fake()->randomElement($types);

        $names = [
            'vps' => ['VPS Pro — NYC-01', 'Cloud VPS — LON-03', 'VPS Starter — FRA-02'],
            'dedicado' => ['Dedicado — MIA-02', 'Dedicado Pro — SFO-01'],
            'compartido' => ['Hosting Pro — acme.io', 'Hosting Personal — portfolio.net'],
        ];

        $locations = [
            'Nueva York, EE.UU.',
            'Miami, EE.UU.',
            'Londres, Reino Unido',
            'Fráncfort, Alemania',
            'San Francisco, EE.UU.',
        ];

        $prices = [
            'vps' => fake()->randomFloat(2, 10, 45),
            'dedicado' => fake()->randomFloat(2, 79, 199),
            'compartido' => fake()->randomFloat(2, 2.99, 9.99),
        ];

        return [
            'user_id' => User::factory(),
            'name' => fake()->randomElement($names[$type]),
            'type' => $type,
            'status' => fake()->randomElement(['active', 'active', 'active', 'suspended']), // 75% active
            'location' => fake()->randomElement($locations),
            'ip_address' => fake()->ipv4(),
            'price' => $prices[$type],
            'billing_cycle' => fake()->randomElement(['mes', 'año']),
            'uptime' => fake()->randomFloat(2, 99.5, 100),
            'cpu_usage' => fake()->numberBetween(2, 95),
            'expires_at' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        ];
    }
}
