@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
 
    <!-- Rejilla de Tarjetas de Estadísticas  -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Services Card -->
        <x-stat-card title="Services" value="3" subtext="3 Active Services" illustration="images/cloud-server-svgrepo-com.svg">
            <!-- Icono Cubo/Servicios -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </x-stat-card>

        <!-- Invoices Due Card -->
        <x-stat-card title="Invoices Due" value="1" subtext="1 Unpaid Invoice" illustration="images/invoice-bill-svgrepo-com.svg">
            <!-- Icono Factura/Documento -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </x-stat-card>

        <!-- Domains Card -->
        <x-stat-card title="Domains" value="2" subtext="2 Registered Domains">
            <!-- Icono Globo -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
            </svg>
        </x-stat-card>

        <!-- Support Tickets Card -->
        <x-stat-card title="Support Tickets" value="3" subtext="3 Open Tickets">
            <!-- Icono Auriculares/Soporte -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2zM12 11a3 3 0 100-6 3 3 0 000 6z" />
            </svg>
        </x-stat-card>
    </div>
</div>
@endsection
