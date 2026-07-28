@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-4">

    <!-- Rejilla de Tarjetas de Estadísticas  -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Services Card (Servicios) -->
        <div class="cursor-pointer" onclick="window.location.href='/services'">
            <x-stat-card title="Servicios" value="{{ $activeServicesCount }}" subtext="{{ $activeServicesCount }} Activos" illustration="assets/images/cloud-server-svgrepo-com.svg">
            <!-- Icono Cubo/Servicios -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </x-stat-card>

         </div>
        
        <!-- Invoices Due Card (Facturas Pendientes) -->
         <div class="cursor-pointer" onclick="window.location.href='/invoices'">
            <x-stat-card title="Facturas Pendientes" value="{{ $pendingInvoicesCount }}" subtext="{{ $pendingInvoicesCount }} {{ Str::plural('Pendiente', $pendingInvoicesCount) }}" illustration="assets/images/bill-svgrepo-com.svg">
            <!-- Icono Factura/Documento -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </x-stat-card>
         </div>
        

        <!-- Domains Card (Dominios) -->
        <div class="cursor-pointer" onclick="window.location.href='/domains'">
        <x-stat-card title="Dominios" value="{{ $domainsCount }}" subtext="{{ $domainsCount }} {{ Str::plural('Registrado', $domainsCount) }}" illustration="assets/images/cloud-database-svgrepo-com.svg">
            <!-- Icono Globo -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
            </svg>
        </x-stat-card>
        </div>

        <!-- Support Tickets Card (Tickets de Soporte) -->
         <div class="cursor-pointer" onclick="window.location.href='/tickets'">
        <x-stat-card title="Tickets de Soporte" value="{{ $openTicketsCount }}" subtext="{{ $openTicketsCount }} {{ Str::plural('Abierto', $openTicketsCount) }}" illustration="assets/images/disk1-svgrepo-com.svg">
            <!-- Icono Auriculares/Soporte -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2zM12 11a3 3 0 100-6 3 3 0 000 6z"/>
            </svg>
        </x-stat-card>
        </div>    
    </div>

    <!-- Servicios Activos y Anuncios -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Tabla de Servicios Activos -->
        <div class="lg:col-span-2 bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
            <!-- Encabezado de la Tabla -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-col">
                    <h3 class="text-lg font-extrabold text-[#1B254B] tracking-tight">Servicios Activos</h3>
                    <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Lista de servicios activos asociados a tu cuenta</span>
                </div>
            </div>

            <!-- Contenedor Responsive para Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px] border-collapse">
                    <thead>
                        <tr class="border-b border-[#F4F7FE] text-left">
                            <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3 pl-2">Servicio</th>
                            <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Dominio</th>
                            <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Precio</th>
                            <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Próximo Pago</th>
                            <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3 pr-2 text-right">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#F4F7FE] align-middle">
                        @forelse ($services as $service)
                            @php
                                $iconPath = match($service->type) {
                                    'vps' => 'M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5',
                                    'dedicado' => 'M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75',
                                    default => 'M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75',
                                };
                                $subtitle = match($service->type) {
                                    'vps' => 'Servidor VPS Cloud',
                                    'dedicado' => 'Servidor Dedicado Pro',
                                    default => 'Hosting Compartido Web',
                                };
                            @endphp
                            <tr class="hover:bg-[#F4F7FE]/20 transition-colors duration-150">
                                <td class="py-4 pl-2 flex items-center gap-3">
                                    <div class="h-9 w-9 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-[#1B254B]">{{ $service->name }}</span>
                                        <span class="text-[9px] text-[#A3AED0] font-semibold">{{ $subtitle }}</span>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs font-bold text-[#1B254B]">{{ $service->ip_address }}</span>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs font-bold text-[#1B254B]">${{ number_format($service->price, 2) }} USD <span class="text-[9px] text-[#A3AED0] font-semibold">/{{ $service->billing_cycle }}</span></span>
                                </td>
                                <td class="py-4">
                                    <span class="text-xs font-bold text-[#1B254B]">{{ $service->expires_at->format('d M, Y') }}</span>
                                </td>
                                <td class="py-4 pr-2 text-right">
                                    @if ($service->status === 'active')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-500">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                            Activo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-red-50 text-red-500">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Suspendido
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-xs font-bold text-[#A3AED0]">
                                    No tienes ningún servicio activo.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tarjeta de Anuncios -->
        <div class="lg:col-span-1 bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex flex-col justify-between transition-all hover:scale-[1.01] duration-200">
            <!-- Encabezado de Anuncios -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex flex-col">
                        <h3 class="text-lg font-extrabold text-[#1B254B] tracking-tight">Anuncios</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Últimas novedades y avisos importantes</span>
                    </div>
                </div>

                <!-- Banner Destacado (Promo) -->
                <div class="bg-gradient-to-br from-[#868CFF] via-[#5C5CFF] to-[#4318FF] rounded-[16px] p-4 text-white relative overflow-hidden mb-5 select-none transition-all duration-300 hover:shadow-[0px_10px_35px_rgba(67,24,255,0.25)] group/banner">
                    <!-- Figma-style overlay glow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-y-12 transition-transform duration-700 group-hover/banner:translate-x-full"></div>
                    
                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <span class="inline-block text-[8px] font-extrabold uppercase tracking-wider bg-white/20 px-2 py-0.5 rounded-md mb-2">¡Descuento Exclusivo! 🚀</span>
                            <h4 class="text-xs font-black leading-snug">Duplica tus recursos en Servidores Cloud GPU con 50% de descuento</h4>
                        </div>
                        <a href="#"onclick="window.location.href='/tickets' class="mt-3 inline-flex items-center gap-1 text-[9px] font-extrabold hover:underline">
                            <span>Adquirir ahora</span>
                            <svg class="h-2.5 w-2.5 transform group-hover/banner:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Lista de Anuncios Recientes -->
                <div class="space-y-4">
                    <!-- Anuncio 1: Mantenimiento -->
                    <div class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F4F7FE]/40 transition-colors duration-150">
                        <div class="h-8 w-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <div class="flex items-center gap-2 mb-0.5">
                                <span class="text-[8px] font-extrabold uppercase tracking-wider text-amber-500 bg-amber-50 px-1.5 py-0.5 rounded-md">Mantenimiento</span>
                                <span class="text-[9px] text-[#A3AED0] font-bold">05 de Julio</span>
                            </div>
                            <span class="text-xs font-bold text-[#1B254B] truncate">Nodo VPS-04 US-East (Virginia)</span>
                            <span class="text-[10px] text-[#A3AED0] font-semibold truncate mt-0.5">Mantenimiento programado de 02:00 a 04:00 UTC.</span>
                        </div>
                    </div>

                    <!-- Anuncio 2: Nueva Región -->
                    <div class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F4F7FE]/40 transition-colors duration-150">
                        <div class="h-8 w-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
                            </svg>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <div class="flex items-center gap-2 mb-0.5">
                                <span class="text-[8px] font-extrabold uppercase tracking-wider text-emerald-500 bg-emerald-50 px-1.5 py-0.5 rounded-md">Lanzamiento</span>
                                <span class="text-[9px] text-[#A3AED0] font-bold">28 de Junio</span>
                            </div>
                            <span class="text-xs font-bold text-[#1B254B] truncate">Nueva Región: España (Madrid)</span>
                            <span class="text-[10px] text-[#A3AED0] font-semibold truncate mt-0.5">Despliega tus servidores ahora con latencia mínima.</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  Facturas y Tickets de Soporte -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Tarjeta de Facturas -->
        <div class="bg-white rounded-[16px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col justify-between transition-all hover:scale-[1.01] duration-200 min-h-[290px]">
            <div>
                <!-- Encabezado de Facturas -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex flex-col">
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Facturas Recientes</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Control de pagos y transacciones pendientes</span>
                    </div>
                    <!-- Icono Factura -->
                    <div class="h-8 w-8 rounded-lg bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Lista de Facturas -->
                <div class="space-y-2.5">
                    @forelse ($recentInvoices as $invoice)
                        @php
                            $isPaid = $invoice->status === 'paid';
                            $isOverdue = $invoice->status === 'unpaid' && $invoice->due_at->isPast();
                        @endphp
                        <div class="flex items-center justify-between py-2 px-2.5 rounded-lg hover:bg-[#F4F7FE]/40 transition-colors duration-150 border border-transparent hover:border-[#F4F7FE]">
                            <div class="flex items-center gap-3 min-w-0">
                                @if ($isPaid)
                                    <div class="h-8 w-8 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                @elseif ($isOverdue)
                                    <div class="h-8 w-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="h-8 w-8 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex flex-col min-w-0 font-sans">
                                    <span class="text-xs font-bold text-[#1B254B]">Factura {{ $invoice->invoice_number }}</span>
                                    @if ($isPaid)
                                        <span class="text-[9px] text-[#A3AED0] font-bold mt-0.5">Pagada: {{ $invoice->paid_at ? $invoice->paid_at->format('d M, Y') : '' }}</span>
                                    @elseif ($isOverdue)
                                        <span class="text-[9px] text-red-500 font-bold mt-0.5">Venció: {{ $invoice->due_at->format('d M, Y') }}</span>
                                    @else
                                        <span class="text-[9px] text-amber-500 font-bold mt-0.5">Vence: {{ $invoice->due_at->format('d M, Y') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-black text-[#1B254B]">${{ number_format($invoice->amount, 2) }} USD</span>
                                @if ($isPaid)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[8px] font-extrabold bg-emerald-50 text-emerald-500 select-none">
                                        Pagada
                                    </span>
                                @elseif ($isOverdue)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[8px] font-extrabold bg-red-50 text-red-500 select-none">
                                        Vencida
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[8px] font-extrabold bg-amber-50 text-amber-500 select-none">
                                        Pendiente
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="py-6 text-center text-xs font-bold text-[#A3AED0]">
                            No tienes facturas recientes.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Botón Ver Todos -->
            <a href="{{ route('invoices') }}" class="mt-3.5 flex items-center justify-center gap-1.5 bg-[#F4F7FE] hover:bg-[#E0E5F2] text-[10px] font-extrabold text-[#4318FF] py-2.5 px-3 rounded-lg border border-[#E0E5F2] transition-all group duration-200">
                <span>Ver todas las facturas</span>
                <svg class="h-3 w-3 transform group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        <!-- Tarjeta de Tickets de Soporte -->
        <div class="bg-white rounded-[16px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col justify-between transition-all hover:scale-[1.01] duration-200 min-h-[290px]">
            <div>
                <!-- Encabezado de Tickets -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex flex-col">
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Tickets de Soporte</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Estado de tus consultas técnicas activas</span>
                    </div>
                    <!-- Icono Soporte -->
                    <div class="h-8 w-8 rounded-lg bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a.75.75 0 01-1.074-.765 6.002 6.002 0 011.164-3.41C4.412 15.357 3.75 13.748 3.75 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>
                    </div>
                </div>

                <!-- Lista de Tickets -->
                <div class="space-y-2.5">
                    @forelse ($recentTickets as $ticket)
                        @php
                            $badgeClass = match ($ticket->status) {
                                'open' => 'bg-amber-50 text-amber-500',
                                'replied' => 'bg-[#4318FF]/5 text-[#4318FF]',
                                default => 'bg-slate-100 text-slate-500',
                            };
                            $badgeLabel = match ($ticket->status) {
                                'open' => 'En Proceso',
                                'replied' => 'Respondido',
                                default => 'Cerrado',
                            };
                        @endphp
                        <div class="flex items-center justify-between py-2 px-2.5 rounded-lg hover:bg-[#F4F7FE]/40 transition-colors duration-150 border border-transparent hover:border-[#F4F7FE]">
                            <div class="flex items-center gap-3 min-w-0 font-sans">
                                <div class="h-8 w-8 rounded-lg {{ $badgeClass }} flex items-center justify-center shrink-0">
                                    @if ($ticket->status === 'replied')
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-2.503a8.01 8.01 0 001.88-.188c1.853-.5 3.26-2.09 3.26-4.004V8.585c0-1.925-1.4-3.513-3.26-4.01a14.963 14.963 0 00-7.06 0C4.9 5.072 3.5 6.66 3.5 8.586v4.174z" />
                                        </svg>
                                    @else
                                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <span class="text-xs font-bold text-[#1B254B] truncate">{{ $ticket->subject }}</span>
                                    <span class="text-[9px] text-[#A3AED0] font-bold mt-0.5">ID: #TK-{{ $ticket->id }} • Act: {{ $ticket->updated_at->diffForHumans(null, true) }}</span>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[8px] font-extrabold {{ $badgeClass }} select-none shrink-0">
                                {{ $badgeLabel }}
                            </span>
                        </div>
                    @empty
                        <div class="py-6 text-center text-xs font-bold text-[#A3AED0]">
                            No tienes tickets recientes.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-3.5 flex flex-col sm:flex-row gap-2">
                <a href="{{ route('tickets') }}" class="flex-1 flex items-center justify-center gap-1.5 bg-[#F4F7FE] hover:bg-[#E0E5F2] text-[10px] font-extrabold text-[#4318FF] py-2.5 px-3 rounded-lg border border-[#E0E5F2] transition-all group duration-200">
                    <span>Ver todos</span>
                </a>
                <a href="{{ route('tickets') }}" class="flex-1 flex items-center justify-center gap-1.5 bg-[#4318FF] hover:bg-[#3b15e0] active:scale-95 text-white text-[10px] font-extrabold py-2.5 px-3 rounded-lg transition-all shadow-[0px_8px_20px_rgba(67,24,255,0.15)] duration-200">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span>Nuevo Ticket</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
