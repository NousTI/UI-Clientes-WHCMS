<?php

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\Invoice;
use App\Models\Referral;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default test user
        $testUser = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'test@example.com',
        ]);

        // Seed services for the test user
        Service::factory()->create([
            'user_id' => $testUser->id,
            'name' => 'VPS Pro — NYC-01',
            'type' => 'vps',
            'status' => 'active',
            'location' => 'Nueva York, EE.UU.',
            'ip_address' => '198.51.100.42',
            'price' => 24.00,
            'billing_cycle' => 'mes',
            'uptime' => 99.98,
            'cpu_usage' => 87,
            'expires_at' => '2027-01-15',
        ]);

        Service::factory()->create([
            'user_id' => $testUser->id,
            'name' => 'Dedicado — MIA-02',
            'type' => 'dedicado',
            'status' => 'active',
            'location' => 'Miami, EE.UU.',
            'ip_address' => '203.0.113.88',
            'price' => 89.00,
            'billing_cycle' => 'mes',
            'uptime' => 100.00,
            'cpu_usage' => 32,
            'expires_at' => '2027-02-08',
        ]);

        Service::factory()->create([
            'user_id' => $testUser->id,
            'name' => 'Hosting Pro — acme.io',
            'type' => 'compartido',
            'status' => 'active',
            'location' => 'Fráncfort, Alemania',
            'ip_address' => '192.0.2.115',
            'price' => 9.99,
            'billing_cycle' => 'mes',
            'uptime' => 99.95,
            'cpu_usage' => 12,
            'expires_at' => '2027-05-20',
        ]);

        Service::factory()->create([
            'user_id' => $testUser->id,
            'name' => 'VPS Starter — FRA-02',
            'type' => 'vps',
            'status' => 'suspended',
            'location' => 'Fráncfort, Alemania',
            'ip_address' => '198.51.100.109',
            'price' => 12.00,
            'billing_cycle' => 'mes',
            'uptime' => 0.00,
            'cpu_usage' => 0,
            'expires_at' => '2026-07-10',
        ]);

        // Seed domains for the test user
        Domain::factory()->create([
            'user_id' => $testUser->id,
            'domain_name' => 'acme.io',
            'status' => 'active',
            'is_locked' => true,
            'auto_renew' => false,
            'dns_type' => 'DNS Personalizado',
            'price' => 12.99,
            'expires_at' => '2027-01-15',
        ]);

        Domain::factory()->create([
            'user_id' => $testUser->id,
            'domain_name' => 'acme-labs.com',
            'status' => 'active',
            'is_locked' => true,
            'auto_renew' => true,
            'dns_type' => 'DNS Personalizado',
            'price' => 14.99,
            'expires_at' => '2027-08-22',
        ]);

        // Seed invoices for the test user
        Invoice::factory()->create([
            'user_id' => $testUser->id,
            'invoice_number' => '#FAC-2026-005',
            'description' => 'Renovación Cloud VPS Premium',
            'amount' => 29.00,
            'status' => 'unpaid',
            'due_at' => '2026-07-20',
            'paid_at' => null,
        ]);

        Invoice::factory()->create([
            'user_id' => $testUser->id,
            'invoice_number' => '#FAC-2026-004',
            'description' => 'Renovación Base de Datos PostgreSQL',
            'amount' => 15.00,
            'status' => 'paid',
            'due_at' => '2026-06-02',
            'paid_at' => '2026-06-02',
        ]);

        Invoice::factory()->create([
            'user_id' => $testUser->id,
            'invoice_number' => '#FAC-2026-003',
            'description' => 'Registro de Dominio acme-labs.com',
            'amount' => 14.99,
            'status' => 'paid',
            'due_at' => '2026-08-22',
            'paid_at' => '2026-08-22',
        ]);

        // Seed tickets for the test user
        $ticket1 = Ticket::factory()->create([
            'user_id' => $testUser->id,
            'ticket_number' => '#TKT-2026-008',
            'subject' => 'VPS NYC-01 — Sin acceso SSH tras reinicio de emergencia',
            'department' => 'Soporte',
            'priority' => 'critical',
            'status' => 'open',
        ]);

        TicketMessage::factory()->create([
            'ticket_id' => $ticket1->id,
            'user_id' => $testUser->id,
            'message' => 'Después de reiniciar el servidor no es posible conectarse vía SSH. El servidor responde ping pero el puerto 22 parece bloqueado. Firewall revisado sin cambios.',
            'is_agent' => false,
        ]);

        $ticket2 = Ticket::factory()->create([
            'user_id' => $testUser->id,
            'ticket_number' => '#TKT-2026-004',
            'subject' => 'Consulta sobre cobro de IVA en mi factura',
            'department' => 'Facturación',
            'priority' => 'medium',
            'status' => 'resolved',
        ]);

        TicketMessage::factory()->create([
            'ticket_id' => $ticket2->id,
            'user_id' => $testUser->id,
            'message' => 'Hola, veo que en mi factura #FAC-2026-004 se aplicó un impuesto de IVA que no correspondía ya que estoy exento por mi ubicación fiscal registrada.',
            'is_agent' => false,
        ]);

        TicketMessage::factory()->create([
            'ticket_id' => $ticket2->id,
            'user_id' => User::factory()->create(['name' => 'Agent Sophie']),
            'message' => 'Hola. Hemos verificado tu caso y efectivamente corregimos tu perfil. He emitido un reembolso parcial por la diferencia. Saludos.',
            'is_agent' => true,
        ]);

        // Seed referrals for the test user to match mockup totals
        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'María Castro',
            'registered_at' => '2026-06-15',
            'status' => 'active',
            'commission_rate' => 20.00,
            'total_earned' => 47.60,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Jorge Ramírez',
            'registered_at' => '2026-06-02',
            'status' => 'active',
            'commission_rate' => 20.00,
            'total_earned' => 32.40,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Luisa García',
            'registered_at' => '2026-05-20',
            'status' => 'pending',
            'commission_rate' => 20.00,
            'total_earned' => 0.00,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Andrés Pérez',
            'registered_at' => '2026-05-10',
            'status' => 'active',
            'commission_rate' => 20.00,
            'total_earned' => 58.20,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Sofía López',
            'registered_at' => '2026-04-02',
            'status' => 'active',
            'commission_rate' => 20.00,
            'total_earned' => 43.80,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Carlos Ruiz',
            'registered_at' => '2026-03-15',
            'status' => 'active',
            'commission_rate' => 20.00,
            'total_earned' => 28.00,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Ana Gómez',
            'registered_at' => '2026-02-10',
            'status' => 'pending',
            'commission_rate' => 20.00,
            'total_earned' => 0.00,
        ]);

        Referral::factory()->create([
            'user_id' => $testUser->id,
            'referred_name' => 'Pedro Díaz',
            'registered_at' => '2026-01-05',
            'status' => 'pending',
            'commission_rate' => 20.00,
            'total_earned' => 0.00,
        ]);

        // Create some random data for other users as well
        User::factory(5)->create()->each(function ($user) {
            Service::factory(rand(1, 3))->create(['user_id' => $user->id]);
            Domain::factory(rand(0, 2))->create(['user_id' => $user->id]);
            Invoice::factory(rand(1, 4))->create(['user_id' => $user->id]);
            $ticket = Ticket::factory()->create(['user_id' => $user->id]);
            TicketMessage::factory(rand(1, 3))->create(['ticket_id' => $ticket->id, 'user_id' => $user->id]);
            Referral::factory(rand(1, 5))->create(['user_id' => $user->id]);
        });
    }
}
