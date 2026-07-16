<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Soporte' => [
                'VPS NYC-01 — Sin acceso SSH tras reinicio de emergencia',
                'Problemas con propagación DNS en dominio secundario',
                'Error de memoria excedida en servidor compartido',
                'Solicitud de ampliación de almacenamiento de disco SSD',
            ],
            'Facturación' => [
                'Factura duplicada en cargo automático de tarjeta',
                'Error en la aplicación del código de descuento de afiliado',
                'Solicitud de factura fiscal con datos actualizados',
                'Consulta de reembolsos por servicio cancelado',
            ],
        ];

        $department = fake()->randomElement(['Soporte', 'Facturación']);
        $subject = fake()->randomElement($subjects[$department]);

        return [
            'user_id' => User::factory(),
            'ticket_number' => '#TKT-'.fake()->year().'-'.fake()->unique()->numberBetween(100, 999),
            'subject' => $subject,
            'department' => $department,
            'priority' => fake()->randomElement(['low', 'medium', 'high', 'critical']),
            'status' => fake()->randomElement(['open', 'in_progress', 'resolved', 'closed']),
        ];
    }
}
