<?php

use App\Models\Domain;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});

test('authenticated users can visit the services page', function () {
    $user = User::factory()->create();
    Service::factory()->count(3)->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('services'));
    $response->assertOk()
        ->assertViewHas('services')
        ->assertViewHas('servicesCount')
        ->assertViewHas('activeServicesCount')
        ->assertViewHas('suspendedServicesCount')
        ->assertViewHas('monthlyCost');
});

test('authenticated users can visit the domains page', function () {
    $user = User::factory()->create();
    Domain::factory()->count(3)->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('domains'));
    $response->assertOk()
        ->assertViewHas('domains')
        ->assertViewHas('domainsCount')
        ->assertViewHas('activeDomainsCount');
});

test('authenticated users can visit the invoices page', function () {
    $user = User::factory()->create();
    Invoice::factory()->count(3)->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('invoices'));
    $response->assertOk()
        ->assertViewHas('invoices')
        ->assertViewHas('invoicesCount')
        ->assertViewHas('pendingInvoicesCount')
        ->assertViewHas('totalPaidAmount')
        ->assertViewHas('totalUnpaidAmount');
});

test('authenticated users can visit the tickets page', function () {
    $user = User::factory()->create();
    $Ticket = Ticket::factory()->count(3)->create(['user_id' => $user->id]);

    $this->actingAs($user);

    $response = $this->get(route('tickets'));
    $response->assertOk()
        ->assertViewHas('tickets')
        ->assertViewHas('ticketsCount')
        ->assertViewHas('openTicketsCount');
});

test('authenticated users can download their own invoice as PDF', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get(route('invoices.download', 301));
    $response->assertOk();
    $response->assertHeader('Content-Disposition', 'attachment; filename=factura-NTE-2026-894.pdf');
});

test('authenticated users cannot download invalid or non-owned invoices', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get(route('invoices.download', 999));
    $response->assertStatus(403);
});
