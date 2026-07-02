@extends('layouts.app')

@section('title', 'Facturas')

@section('content')
<div class="space-y-6">

    <!-- Encabezado de la Página -->
    <div class="flex flex-col">
        <h1 class="text-2xl font-black text-[#1B254B] tracking-tight">Facturas</h1>
        <p class="text-xs font-bold text-[#A3AED0] mt-1">Historial de pagos y facturas pendientes</p>
    </div>

    <!-- Rejilla de Tarjetas de Estadísticas de Facturas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Tarjeta 1: Total Facturado -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono Dólar/Ingresos -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727l-.214-.113a3.181 3.181 0 00-3.572 0L9 8.09a3.181 3.181 0 00-1.5 2.727v2.364c0 1.25.75 2.364 1.5 2.727z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">$320.00</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Total Facturado</span>
            </div>
        </div>

        <!-- Tarjeta 2: Pagadas -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono Check -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">4</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Facturas Pagadas</span>
            </div>
        </div>

        <!-- Tarjeta 3: Pendientes -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <!-- Icono Advertencia -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">1</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Pendientes</span>
            </div>
        </div>

        <!-- Tarjeta 4: Último Pago -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <!-- Icono Factura/Documento -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">$29.00</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Último Pago</span>
            </div>
        </div>
    </div>

    <!-- Rejilla Principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Lista de Facturas -->
        <div class="lg:col-span-2 space-y-3">
            <!-- Factura 1: Pendiente -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Documento (Naranja) -->
                    <div class="h-10 w-10 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <!-- Detalles -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">#FAC-2026-005</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-amber-500/10 text-amber-500">PENDIENTE</span>
                        </div>
                        <p class="text-xs font-bold text-[#1B254B] truncate mt-1">Renovación Cloud VPS Premium</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Emisión: 2026-07-02</span>
                            <span class="text-red-500 font-extrabold">📅 Vence: 2026-07-10</span>
                        </div>
                    </div>
                </div>

                <!-- Pago & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$29.00 USD</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-1.5 px-3.5 rounded-full transition-all shadow-sm">
                            Pagar
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Factura 2: Pagada -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Documento (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <!-- Detalles -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">#FAC-2026-004</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">PAGADO</span>
                        </div>
                        <p class="text-xs font-bold text-[#1B254B] truncate mt-1">Renovación Base de Datos PostgreSQL</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Emisión: 2026-06-02</span>
                            <span>📅 Pagado: 2026-06-02</span>
                        </div>
                    </div>
                </div>

                <!-- Pago & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$89.00 USD</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-[#4318FF] hover:text-[#3b15e0] font-black text-xs transition-colors hover:underline">
                            PDF
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Factura 3: Pagada -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Documento (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <!-- Detalles -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">#FAC-2026-003</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">PAGADO</span>
                        </div>
                        <p class="text-xs font-bold text-[#1B254B] truncate mt-1">Registro de Dominio acme-labs.com</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Emisión: 2025-08-22</span>
                            <span>📅 Pagado: 2025-08-22</span>
                        </div>
                    </div>
                </div>

                <!-- Pago & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$14.99 USD</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-[#4318FF] hover:text-[#3b15e0] font-black text-xs transition-colors hover:underline">
                            PDF
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Factura 4: Pagada -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Documento (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <!-- Detalles -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">#FAC-2026-002</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">PAGADO</span>
                        </div>
                        <p class="text-xs font-bold text-[#1B254B] truncate mt-1">Renovación Hosting Compartido Reseller</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Emisión: 2026-06-15</span>
                            <span>📅 Pagado: 2026-06-15</span>
                        </div>
                    </div>
                </div>

                <!-- Pago & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$49.00 USD</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-[#4318FF] hover:text-[#3b15e0] font-black text-xs transition-colors hover:underline">
                            PDF
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Factura 5: Pagada -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Documento (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <!-- Detalles -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">#FAC-2026-001</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">PAGADO</span>
                        </div>
                        <p class="text-xs font-bold text-[#1B254B] truncate mt-1">Registro de Dominio acme.io</p>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Emisión: 2024-01-15</span>
                            <span>📅 Pagado: 2024-01-15</span>
                        </div>
                    </div>
                </div>

                <!-- Pago & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$12.99 USD</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="text-[#4318FF] hover:text-[#3b15e0] font-black text-xs transition-colors hover:underline">
                            PDF
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Lateral (Métodos de Pago & Alertas) -->
        <div class="lg:col-span-1 space-y-6">

            <!-- Tarjeta Métodos de Pago -->
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50">
                <h3 class="text-sm font-black text-[#1B254B] mb-4">Métodos de Pago</h3>
                <div class="space-y-3">
                    <!-- Visa default -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl border border-slate-100 bg-slate-50/50">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-12 rounded bg-[#1A1F36] text-white flex items-center justify-center text-[10px] font-black tracking-widest uppercase">
                                VISA
                            </div>
                            <div class="flex flex-col leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">Visa terminada en 4242</span>
                                <span class="text-[9px] text-[#A3AED0] font-bold mt-0.5">Expira: 12/2028 (Predeterminado)</span>
                            </div>
                        </div>
                    </div>

                    <!-- PayPal -->
                    <div class="flex items-center justify-between p-3.5 rounded-xl border border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-12 rounded bg-[#003087] text-white flex items-center justify-center text-[8px] font-black uppercase">
                                PayPal
                            </div>
                            <div class="flex flex-col leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">pay***@acme.io</span>
                                <span class="text-[9px] text-[#A3AED0] font-bold mt-0.5">Cuenta conectada</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="w-full flex items-center justify-center gap-1.5 bg-[#4318FF] hover:bg-[#3b15e0] active:scale-95 text-white text-xs font-extrabold py-3 px-4 rounded-xl transition-all shadow-[0px_10px_20px_rgba(67,24,255,0.15)] mt-4 cursor-pointer">
                    Agregar Método de Pago
                </button>
            </div>

            <!-- Tarjeta Alerta Factura Pendiente -->
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-amber-200 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 text-amber-500">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <h4 class="text-xs font-black uppercase tracking-wider">Factura Pendiente</h4>
                    </div>
                    <p class="text-xs font-bold text-[#1B254B] leading-relaxed mt-3">
                        La factura <span class="font-extrabold">#FAC-2026-005</span> vence el <span class="text-amber-500 font-extrabold">10 de Julio, 2026</span>. Evita la suspensión del servicio realizando el pago a tiempo.
                    </p>
                </div>
                <button class="w-full bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-xs font-extrabold py-3 px-4 rounded-xl transition-all shadow-sm mt-5 cursor-pointer">
                    Pagar Factura
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
