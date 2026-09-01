<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class WhmcsService
{
    protected string $url;

    protected string $identifier;

    protected string $secret;

    public function __construct()
    {
        $this->url = rtrim(config('services.whmcs.url'), '/');
        $this->identifier = config('services.whmcs.identifier');
        $this->secret = config('services.whmcs.secret');
    }

    /* Realiza una petición a la API de WHMCS.* */
    public function request(string $action, array $params = []): array
    {
        $response = Http::asForm()->post(
            "{$this->url}/includes/api.php",
            array_merge([
                'identifier' => $this->identifier,
                'secret' => $this->secret,
                'action' => $action,
                'responsetype' => 'json',
            ], $params)
        );

        if (! $response->successful()) {
            throw new Exception('No fue posible conectar con WHMCS.');
        }

        $data = $response->json();

        if (($data['result'] ?? '') !== 'success') {
            throw new Exception($data['message'] ?? 'Error desconocido en WHMCS.');
        }

        return $data;
    }

    /**
     * Obtener datos de un cliente.
     */
    public function getClient(int $clientId): array
    {
        return $this->request('GetClientsDetails', [
            'clientid' => $clientId,
        ]);
    }

    /**
     * Obtener servicios de un cliente.
     */
    public function getServices(int $clientId): array
    {
        return $this->request('GetClientsProducts', [
            'clientid' => $clientId,
        ]);
    }

    /**
     * Obtener dominios de un cliente.
     */
    public function getDomains(int $clientId): array
    {
        return $this->request('GetClientsDomains', [
            'clientid' => $clientId,
        ]);
    }

    /**
     * Obtener facturas de un cliente.
     */
    public function getInvoice(int $invoiceId): array
    {
        return $this->request('GetInvoice', [
            'invoiceid' => $invoiceId,
        ]);
    }

    /**
     * Obtener tickets de un cliente.
     */
    public function getTickets(int $clientId): array
    {
        return $this->request('GetTickets', [
            'clientid' => $clientId,
        ]);
    }
}
