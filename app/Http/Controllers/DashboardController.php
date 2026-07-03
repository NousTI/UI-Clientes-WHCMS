<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function services()
    {
        return view('dashboard.services');
    }

    public function domains()
    {
        return view('dashboard.domains');
    }

    public function invoices()
    {
        return view('dashboard.invoices');
    }

    public function tickets()
    {
        return view('dashboard.tickets');
    }
}
