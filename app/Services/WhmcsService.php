<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhmcsService
{
    /**
     * Compruebe si la API está configurada.
     */
    public static function isConfigured(): bool
    {
        return ! empty(config('services.whmcs.
        url'));
    }

    /**
     * Envía una solicitud a la API de WHMCS.
     */
    protected static function sendRequest(string $action, array $params = []): array
    {
        $url = config('services.whmcs.url');

        $postfields = [
            'action' => $action,
            'responsetype' => 'json',
        ];

        // Parametros de autentificacoin
        $identifier = config('services.whmcs.identifier');
        $secret = config('services.whmcs.secret');
        $username = config('services.whmcs.username');
        $password = config('services.whmcs.password');

        if (! empty($identifier) && ! empty($secret)) {
            $postfields['identifier'] = $identifier;
            $postfields['secret'] = $secret;
        } else {
            $postfields['username'] = $username;
            $postfields['password'] = $password;
        }

        $postfields = array_merge($postfields, $params);

        try {
            $response = Http::asForm()->post($url, $postfields);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['result']) && $data['result'] === 'success') {
                    return $data;
                }
                Log::warning("WHMCS API returned error for action {$action}: ".json_encode($data));
            } else {
                Log::error('WHMCS API connection failed with status code: '.$response->status());
            }
        } catch (\Exception $e) {
            Log::error('WHMCS API error: '.$e->getMessage());
        }

        return ['result' => 'error'];
    }

    /**
     * Obtener los datos del cliente por correo electrónico.
     */
    public static function getClientDetailsByEmail(string $email): ?array
    {
        if (! self::isConfigured()) {
            // Simulator Mode
            return [
                'clientid' => 12,
                'firstname' => 'Usuario',
                'lastname' => 'Prueba',
                'email' => $email,
                'status' => 'Active',
            ];
        }

        $response = self::sendRequest('GetClientsDetails', ['email' => $email]);

        if (isset($response['result']) && $response['result'] === 'success') {
            return $response;
        }

        return null;
    }

    /**
     * Fetch client products.
     */
    public static function getProducts(int $clientId): array
    {
        if (! self::isConfigured()) {
            // Simulator Mode (VPS and Hostings)
            return [
                [
                    'id' => 101,
                    'name' => 'VPS SSD Linux Pro',
                    'type' => 'vps',
                    'status' => 'active',
                    'ip_address' => '193.168.4.12',
                    'location' => 'Estados Unidos (Virginia)',
                    'expires_at' => now()->addDays(20),
                    'uptime' => 99.98,
                    'cpu_usage' => 12,
                    'price' => 15.00,
                    'billing_cycle' => 'mes',
                ],
                [
                    'id' => 102,
                    'name' => 'Cloud Hosting Corporativo',
                    'type' => 'compartido',
                    'status' => 'active',
                    'ip_address' => '193.168.4.25',
                    'location' => 'Alemania (Frankfurt)',
                    'expires_at' => now()->addDays(45),
                    'uptime' => 99.99,
                    'cpu_usage' => 0, // No aplica para compartido
                    'price' => 120.00,
                    'billing_cycle' => 'año',
                ],
                [
                    'id' => 103,
                    'name' => 'VPS GPU Deep Learning',
                    'type' => 'vps',
                    'status' => 'active',
                    'ip_address' => '193.168.4.88',
                    'location' => 'Estados Unidos (Oregon)',
                    'expires_at' => now()->addDays(14),
                    'uptime' => 99.95,
                    'cpu_usage' => 84, // Alerta
                    'price' => 45.00,
                    'billing_cycle' => 'mes',
                ],
            ];
        }

        $response = self::sendRequest('GetClientsProducts', ['clientid' => $clientId]);

        $products = [];
        if (isset($response['products']['product'])) {
            $rawProducts = $response['products']['product'];
            // Normalize single item list to array of items
            if (isset($rawProducts['id'])) {
                $rawProducts = [$rawProducts];
            }

            foreach ($rawProducts as $item) {
                // Determine type based on name or group
                $nameLower = strtolower($item['name'] ?? '');
                $type = 'compartido';
                if (str_contains($nameLower, 'vps') || str_contains($nameLower, 'virtual')) {
                    $type = 'vps';
                } elseif (str_contains($nameLower, 'dedic') || str_contains($nameLower, 'dedicated')) {
                    $type = 'dedicado';
                }

                // Determine billing cycle mapping
                $rawCycle = strtolower($item['billingcycle'] ?? '');
                $cycle = 'mes';
                if (str_contains($rawCycle, 'annual') || str_contains($rawCycle, 'año')) {
                    $cycle = 'año';
                }

                $products[] = [
                    'id' => (int) $item['id'],
                    'name' => $item['name'] ?? 'Plan de Hosting',
                    'type' => $type,
                    'status' => strtolower($item['status'] ?? 'active'),
                    'ip_address' => $item['ipaddress'] ?? '127.0.0.1',
                    'location' => $item['serverhostname'] ?? 'Global',
                    'expires_at' => ! empty($item['nextduedate']) ? Carbon::parse($item['nextduedate']) : now()->addMonth(),
                    'uptime' => 99.99,
                    'cpu_usage' => $type === 'vps' ? rand(5, 45) : 0,
                    'price' => (float) ($item['amount'] ?? 0.00),
                    'billing_cycle' => $cycle,
                ];
            }
        }

        return $products;
    }

    /**
     * Fetch client domains.
     */
    public static function getDomains(int $clientId): array
    {
        if (! self::isConfigured()) {
            // Simulator Mode
            return [
                [
                    'id' => 201,
                    'domain_name' => 'miempresa.com',
                    'status' => 'active',
                    'registration_date' => now()->subMonths(10),
                    'expiry_date' => now()->addDays(15), // Expira pronto
                    'recurring_amount' => 12.99,
                ],
                [
                    'id' => 202,
                    'domain_name' => 'nous.tech',
                    'status' => 'active',
                    'registration_date' => now()->subMonths(2),
                    'expiry_date' => now()->addMonths(10),
                    'recurring_amount' => 35.50,
                ],
            ];
        }

        $response = self::sendRequest('GetClientsDomains', ['clientid' => $clientId]);

        $domains = [];
        if (isset($response['domains']['domain'])) {
            $rawDomains = $response['domains']['domain'];
            if (isset($rawDomains['id'])) {
                $rawDomains = [$rawDomains];
            }

            foreach ($rawDomains as $item) {
                $domains[] = [
                    'id' => (int) $item['id'],
                    'domain_name' => $item['domainname'] ?? 'midominio.com',
                    'status' => strtolower($item['status'] ?? 'active'),
                    'registration_date' => ! empty($item['registrationdate']) ? Carbon::parse($item['registrationdate']) : now()->subYear(),
                    'expiry_date' => ! empty($item['expirydate']) ? Carbon::parse($item['expirydate']) : now()->addYear(),
                    'recurring_amount' => (float) ($item['recurringamount'] ?? 12.99),
                ];
            }
        }

        return $domains;
    }

    /**
     * Fetch client invoices.
     */
    public static function getInvoices(int $clientId): array
    {
        if (! self::isConfigured()) {
            // Simulator Mode
            return [
                [
                    'id' => 301,
                    'invoice_number' => 'NTE-2026-894',
                    'description' => 'Servicio - VPS SSD Linux Pro (Pago Mensual)',
                    'amount' => 15.00,
                    'status' => 'paid',
                    'due_at' => now()->subDays(5),
                    'paid_at' => now()->subDays(5),
                ],
                [
                    'id' => 302,
                    'invoice_number' => 'NTE-2026-902',
                    'description' => 'Renovación Dominio - miempresa.com (1 Año)',
                    'amount' => 12.99,
                    'status' => 'unpaid', // Pendiente
                    'due_at' => now()->addDays(15),
                    'paid_at' => null,
                ],
                [
                    'id' => 303,
                    'invoice_number' => 'NTE-2026-784',
                    'description' => 'Servicio - Cloud Hosting Corporativo (Pago Anual)',
                    'amount' => 120.00,
                    'status' => 'paid',
                    'due_at' => now()->subMonths(1),
                    'paid_at' => now()->subMonths(1),
                ],
            ];
        }

        $response = self::sendRequest('GetInvoices', ['userid' => $clientId]);

        $invoices = [];
        if (isset($response['invoices']['invoice'])) {
            $rawInvoices = $response['invoices']['invoice'];
            if (isset($rawInvoices['id'])) {
                $rawInvoices = [$rawInvoices];
            }

            foreach ($rawInvoices as $item) {
                $invoices[] = [
                    'id' => (int) $item['id'],
                    'invoice_number' => $item['invoicenum'] ?? 'NTE-'.$item['id'],
                    'description' => $item['lineitems']['lineitem'][0]['description'] ?? 'Servicio de Hosting',
                    'amount' => (float) ($item['total'] ?? 0.00),
                    'status' => strtolower($item['status'] ?? 'unpaid'),
                    'due_at' => ! empty($item['duedate']) ? Carbon::parse($item['duedate']) : now(),
                    'paid_at' => ! empty($item['datepaid']) ? Carbon::parse($item['datepaid']) : null,
                ];
            }
        }

        return $invoices;
    }
}
