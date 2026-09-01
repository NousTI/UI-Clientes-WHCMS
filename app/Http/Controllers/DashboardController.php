<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Invoice;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the client dashboard overview.
     */
    public function index(): View
    {
        $user = Auth::user();

        $services = $user->services()->get();
        $domains = $user->domains()->get();
        $invoices = $user->invoices()->orderByDesc('due_at')->get();
        $tickets = $user->tickets()->orderByDesc('id')->get();

        $servicesCount = $services->count();
        $activeServicesCount = $services->where('status', 'active')->count();

        $invoicesCount = $invoices->count();
        $pendingInvoicesCount = $invoices->where('status', 'unpaid')->count();

        $domainsCount = $domains->count();

        $ticketsCount = $tickets->count();
        $openTicketsCount = $tickets->where('status', 'open')->count();

        $recentInvoices = $invoices->take(3);
        $recentTickets = $tickets->take(3);
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

    /**
     * Display client services.
     */
    public function services(): View
    {
        $user = Auth::user();
        $services = $user->services()->get();

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

    /**
     * Display client domains.
     */
    public function domains(): View
    {
        $user = Auth::user();
        $domains = $user->domains()->get();

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

    /**
     * Display client invoices.
     */
    public function invoices(): View
    {
        $user = Auth::user();
        $invoices = $user->invoices()->orderByDesc('due_at')->get();

        $invoicesCount = $invoices->count();
        $pendingInvoicesCount = $invoices->where('status', 'unpaid')->count();
        $totalPaidAmount = $invoices->where('status', 'paid')->sum('amount');
        $totalUnpaidAmount = $invoices->where('status', 'unpaid')->sum('amount');

        $activeServices = $user->services()->where('status', 'active')->get();
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

    /**
     * Display client support tickets.
     */
    public function tickets(): View
    {
        $user = Auth::user();
        $tickets = $user->tickets()->with('messages')->orderByDesc('updated_at')->get();

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

    /**
     * Display affiliate statistics and referrals.
     */
    public function affiliates(): View
    {
        $user = Auth::user();
        $referrals = $user->referrals()->orderByDesc('registered_at')->get();

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

    /**
     * Store a new support ticket.
     */
    public function storeTicket(StoreTicketRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $ticket = $user->tickets()->create([
            'ticket_number' => 'TK-'.rand(100000, 999999),
            'subject' => $request->validated('subject'),
            'department' => $request->validated('department'),
            'priority' => $request->validated('priority'),
            'status' => 'open',
        ]);

        $ticket->messages()->create([
            'user_id' => $user->id,
            'message' => $request->validated('message'),
            'is_agent' => false,
        ]);

        return redirect()->route('tickets')->with('success', '¡Ticket de soporte creado con éxito!');
    }

    /**
     * Download an invoice PDF.
     */
    public function downloadInvoice(int|string $invoiceId): Response
    {
        $user = Auth::user();
        $invoice = $user->invoices()->where('id', $invoiceId)->first();

        if (! $invoice) {
            abort(403, 'No tienes permiso para descargar esta factura o no existe.');
        }

        $pdf = Pdf::loadView('pdf.invoice', compact('invoice', 'user'));
        $cleanNumber = ltrim($invoice->invoice_number, '#');

        return $pdf->download("factura-{$cleanNumber}.pdf");
    }
}
