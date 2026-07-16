<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Stats
        $servicesCount = $user->services()->count();
        $activeServicesCount = $user->services()->where('status', 'active')->count();

        $invoicesCount = $user->invoices()->count();
        $pendingInvoicesCount = $user->invoices()->where('status', 'unpaid')->count();

        $domainsCount = $user->domains()->count();

        $ticketsCount = $user->tickets()->count();
        $openTicketsCount = $user->tickets()->where('status', 'open')->count();

        // Active Services list for the dashboard table
        $services = $user->services()->where('status', 'active')->take(4)->get();

        return view('dashboard.index', compact(
            'user',
            'servicesCount',
            'activeServicesCount',
            'invoicesCount',
            'pendingInvoicesCount',
            'domainsCount',
            'ticketsCount',
            'openTicketsCount',
            'services'
        ));
    }

    public function services()
    {
        $user = auth()->user();
        $services = $user->services()->get();

        $servicesCount = $services->count();
        $activeServicesCount = $services->where('status', 'active')->count();
        $suspendedServicesCount = $services->where('status', 'suspended')->count();
        $monthlyCost = $services->where('status', 'active')->sum('price');

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

    public function invoices()
    {
        $user = auth()->user();
        $invoices = $user->invoices()->orderBy('due_at', 'desc')->get();

        $invoicesCount = $invoices->count();
        $pendingInvoicesCount = $invoices->where('status', 'unpaid')->count();
        $totalPaidAmount = $invoices->where('status', 'paid')->sum('amount');
        $totalUnpaidAmount = $invoices->where('status', 'unpaid')->sum('amount');

        return view('dashboard.invoices', compact(
            'invoices',
            'invoicesCount',
            'pendingInvoicesCount',
            'totalPaidAmount',
            'totalUnpaidAmount'
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
        return view('dashboard.affiliates');
    }
}
