<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['paid', 'paid', 'unpaid', 'overdue']);

        if ($status === 'paid') {
            $due_at = fake()->dateTimeBetween('-2 months', '-1 day');
            $paid_at = fake()->dateTimeBetween($due_at, 'now');
        } elseif ($status === 'overdue') {
            $due_at = fake()->dateTimeBetween('-1 month', '-1 day');
            $paid_at = null;
        } else {
            $due_at = fake()->dateTimeBetween('now', '+1 month');
            $paid_at = null;
        }

        $descriptions = [
            'Renovación Cloud VPS Premium',
            'Renovación Base de Datos PostgreSQL',
            'Registro de Dominio Anual',
            'Servidor Dedicado Miami Pro',
            'Soporte Técnico Especializado Extra',
        ];

        return [
            'user_id' => User::factory(),
            'invoice_number' => '#FAC-'.fake()->year().'-'.fake()->unique()->numberBetween(100, 999),
            'description' => fake()->randomElement($descriptions),
            'amount' => fake()->randomFloat(2, 5, 150),
            'status' => $status,
            'due_at' => $due_at->format('Y-m-d'),
            'paid_at' => $paid_at ? $paid_at->format('Y-m-d') : null,
        ];
    }
}
