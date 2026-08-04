<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Services\WhmcsService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $clientId = null;

    private $services = null;

    private $domains = null;

    private $invoices = null;

    private function getWhmcsClientId($user)
    {
        if ($this->clientId === null) {
            $details = WhmcsService::getClientDetailsByEmail($user->email);
            $this->clientId = $details['clientid'] ?? null;
        }

        return $this->clientId;
    }

    private function getWhmcsServices($user)
    {
        if ($this->services === null) {
            $clientId = $this->getWhmcsClientId($user);
            if (! $clientId) {
                $this->services = collect();
            } else {
                $this->services = collect(WhmcsService::getProducts($clientId))->map(function ($item) {
                    return (new Service)->forceFill([
                        'id' => $item['id'],
                        'name' => $item['name'],
                        'type' => $item['type'],
                        'status' => $item['status'],
                        'ip_address' => $item['ip_address'],
                        'location' => $item['location'],
                        'price' => $item['price'],
                        'billing_cycle' => $item['billing_cycle'],
                        'uptime' => $item['uptime'],
                        'cpu_usage' => $item['cpu_usage'],
                        'expires_at' => $item['expires_at'],
                    ]);
                });
            }
        }

        return $this->services;
    }

    private function getWhmcsDomains($user)
    {
        if ($this->domains === null) {
            $clientId = $this->getWhmcsClientId($user);
            if (! $clientId) {
                $this->domains = collect();
            } else {
                $this->domains = collect(WhmcsService::getDomains($clientId))->map(function ($item) {
                    return (new Domain)->forceFill([
                        'id' => $item['id'],
                        'domain_name' => $item['domain_name'],
                        'status' => $item['status'],
                        'is_locked' => true,
                        'auto_renew' => true,
                        'dns_type' => 'Cloudflare DNS',
                        'price' => $item['recurring_amount'] ?? 12.99,
                        'expires_at' => $item['expiry_date'] ?? now()->addYear(),
                    ]);
                });
            }
        }

        return $this->domains;
    }

    private function getWhmcsInvoices($user)
    {
        if ($this->invoices === null) {
            $clientId = $this->getWhmcsClientId($user);
            if (! $clientId) {
                $this->invoices = collect();
            } else {
                $this->invoices = collect(WhmcsService::getInvoices($clientId))->map(function ($item) {
                    return (new Invoice)->forceFill([
                        'id' => $item['id'],
                        'invoice_number' => $item['invoice_number'],
                        'description' => $item['description'],
                        'amount' => $item['amount'],
                        'status' => $item['status'],
                        'due_at' => $item['due_at'],
                        'paid_at' => $item['paid_at'],
                        'created_at' => $item['due_at'] ? $item['due_at']->copy()->subDays(30) : now(),
                    ]);
                })->sortByDesc('due_at');
            }
        }

        return $this->invoices;
    }

    public function index()
    {
        $user = auth()->user();

        $services = $this->getWhmcsServices($user);
        $domains = $this->getWhmcsDomains($user);
        $invoices = $this->getWhmcsInvoices($user);

        // Stats
        $servicesCount = $services->count();

        $activeServicesCount = $services->where('status', 'active')->count();

        $invoicesCount = $invoices->count();
        $pendingInvoicesCount = $invoices->where('status', 'unpaid')->count();

        $domainsCount = $domains->count();

        $tickets = $user->tickets()->orderBy('id', 'desc')->take(3)->get();
        $ticketsCount = $user->tickets()->count();
        $openTicketsCount = $user->tickets()->where('status', 'open')->count();

        $recentInvoices = $invoices->take(3);
        $recentTickets = $tickets;

        // Active Services list for the dashboard table
        $services = $services->where('status', 'active')->take(4);

        return view('dashboard.index', compact(
            'user',
            'servicesCount',
            'activeServicesCount',
            'invoicesCount',
            'pendingInvoicesCount',
            'domainsCount',
            'ticketsCount',
            'openTicketsCount',
            'services',
            'recentInvoices',
            'recentTickets'
        ));
    }

    public function services()
    {
        $user = auth()->user();
        $services = $this->getWhmcsServices($user);

        $servicesCount = $services->count();
        $activeServicesCount = $services->where('status', 'active')->count();
        $suspendedServicesCount = $services->where('status', 'suspended')->count();
        $monthlyCost = $services->where('status', 'active')->sum(function ($service) {
            return $service->billing_cycle === 'año' ? ($service->price / 12) : $service->price;
        });

        return view('dashboard.services', compact(
            'services',
            'servicesCount',
            'activeServicesCount',
            'suspendedServicesCount',
            'monthlyCost'
        ));
    }

    public function domains()
    {
        $user = auth()->user();
        $domains = $this->getWhmcsDomains($user);

        $domainsCount = $domains->count();
        $activeDomainsCount = $domains->where('status', 'active')->count();
        $expiredDomainsCount = $domains->where('status', 'expired')->count();

        return view('dashboard.domains', compact(
            'domains',
            'domainsCount',
            'activeDomainsCount',
            'expiredDomainsCount'
        ));
    }

    public function invoices()
    {
        $user = auth()->user();
        $invoices = $this->getWhmcsInvoices($user);

        $invoicesCount = $invoices->count();
        $pendingInvoicesCount = $invoices->where('status', 'unpaid')->count();
        $totalPaidAmount = $invoices->where('status', 'paid')->sum('amount');
        $totalUnpaidAmount = $invoices->where('status', 'unpaid')->sum('amount');

        // Active services for billing summary
        $activeServices = $this->getWhmcsServices($user)->where('status', 'active');
        $monthlyBillingTotal = $activeServices->sum(function ($service) {
            return $service->billing_cycle === 'año' ? ($service->price / 12) : $service->price;
        });

        return view('dashboard.invoices', compact(
            'invoices',
            'invoicesCount',
            'pendingInvoicesCount',
            'totalPaidAmount',
            'totalUnpaidAmount',
            'activeServices',
            'monthlyBillingTotal'
        ));
    }

    public function tickets()
    {
        $user = auth()->user();
        $tickets = $user->tickets()->with('messages')->orderBy('updated_at', 'desc')->get();

        $ticketsCount = $tickets->count();
        $openTicketsCount = $tickets->where('status', 'open')->count();
        $resolvedTicketsCount = $tickets->whereIn('status', ['resolved', 'closed'])->count();

        return view('dashboard.tickets', compact(
            'tickets',
            'ticketsCount',
            'openTicketsCount',
            'resolvedTicketsCount'
        ));
    }

    public function affiliates()
    {
        $user = auth()->user();
        $referrals = $user->referrals()->orderBy('registered_at', 'desc')->get();

        $referralsCount = $referrals->count();
        $activeCount = $referrals->where('status', 'active')->count();
        $pendingCount = $referrals->where('status', 'pending')->count();

        $totalEarned = $referrals->where('status', 'active')->sum('total_earned');
        $pendingPayout = 47.50;

        return view('dashboard.affiliates', compact(
            'referrals',
            'referralsCount',
            'activeCount',
            'pendingCount',
            'totalEarned',
            'pendingPayout'
        ));
    }

    public function storeTicket(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'priority' => 'required|string|in:low,medium,high,critical',
            'message' => 'required|string',
        ]);

        $user = auth()->user();

        // Create the Ticket
        $ticket = Ticket::create([
            'user_id' => $user->id,
            'ticket_number' => 'TK-'.rand(100000, 999999),
            'subject' => $request->subject,
            'department' => $request->department,
            'priority' => $request->priority,
            'status' => 'open',
        ]);

        // Create the first Message
        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => $user->id,
            'message' => $request->message,
            'is_agent' => false,
        ]);

        return redirect()->route('tickets')->with('success', '¡Ticket de soporte creado con éxito!');
    }

    public function downloadInvoice($invoiceId)
    {
        $user = auth()->user();
        $invoices = $this->getWhmcsInvoices($user);

        // Find the invoice in the user's WHMCS invoices to ensure ownership
        $invoice = $invoices->firstWhere('id', (int) $invoiceId);

        if (! $invoice) {
            abort(403, 'No tienes permiso para descargar esta factura o no existe.');
        }

        $pdf = Pdf::loadView('pdf.invoice', compact('invoice', 'user'));

        return $pdf->download('factura-'.$invoice->invoice_number.'.pdf');
    }
}
