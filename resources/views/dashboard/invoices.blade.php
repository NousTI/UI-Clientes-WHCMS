@extends('layouts.app')

@section('title', 'Facturas')

@section('content')
<div class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Facturas</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Historial de pagos y facturas pendientes</p>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    @php
        $paidInvoicesCount = $invoices->where('status', 'paid')->count();
        $nextUnpaidInvoice = $invoices->where('status', 'unpaid')->sortBy('due_at')->first();
        $lastPaidInvoice = $invoices->where('status', 'paid')->sortByDesc('paid_at')->first();
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Total --}}
        <div class="bg-gradient-to-br from-[#868CFF] via-[#5C5CFF] to-[#4318FF] rounded-[20px] p-5 text-white relative overflow-hidden shadow-[0px_18px_40px_rgba(67,24,255,0.18)] select-none">
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/8 to-white/0 transform skew-y-12"></div>
            <div class="relative z-10 flex items-center gap-4">
                <div class="h-12 w-12 rounded-xl bg-white/15 flex items-center justify-center shrink-0">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727l-.214-.113a3.181 3.181 0 00-3.572 0L9 8.09a3.181 3.181 0 00-1.5 2.727v2.364c0 1.25.75 2.364 1.5 2.727z"/></svg>
                </div>
                <div>
                    <span class="text-[26px] font-black leading-none block">${{ number_format($totalPaidAmount + $totalUnpaidAmount, 2) }}</span>
                    <span class="text-[11px] font-bold text-white/80 block mt-0.5">Total Facturado</span>
                    <span class="text-[9px] font-bold text-white/60 block mt-0.5">Historial</span>
                </div>
            </div>
        </div>
        {{-- Pagadas --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $paidInvoicesCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Facturas Pagadas</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">${{ number_format($totalPaidAmount, 2) }} USD</span>
            </div>
        </div>
        {{-- Pendientes --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-amber-100 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $pendingInvoicesCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Pendiente</span>
                <span class="text-[9px] font-bold text-amber-500 block mt-0.5">${{ number_format($totalUnpaidAmount, 2) }} USD @if($nextUnpaidInvoice)· vence {{ $nextUnpaidInvoice->due_at->format('d M') }}@endif</span>
            </div>
        </div>
        {{-- Último Pago --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">${{ $lastPaidInvoice ? number_format($lastPaidInvoice->amount, 2) : '0.00' }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Último Pago</span>
                <span class="text-[9px] font-bold text-[#A3AED0] block mt-0.5">@if($lastPaidInvoice && $lastPaidInvoice->paid_at){{ $lastPaidInvoice->paid_at->format('d M Y') }}@else N/A @endif</span>
            </div>
        </div>
    </div>

    {{-- ─── Main Grid ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── Invoice Table (2/3) ───────────────────────────────── --}}
        <div class="lg:col-span-2">
            <div x-data="{ currentFilter: 'Todas' }" class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                {{-- Table Header --}}
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Historial de Facturas</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">{{ $invoicesCount }} {{ Str::plural('factura', $invoicesCount) }} en total</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <select x-model="currentFilter" class="rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-2 pl-3 pr-7 text-xs font-bold text-[#1B254B] focus:border-[#4318FF] focus:outline-none appearance-none cursor-pointer">
                            <option value="Todas">Todas</option>
                            <option value="Pagadas">Pagadas</option>
                            <option value="Pendientes">Pendientes</option>
                        </select>
                    </div>
                </div>
                
                {{-- Column Headers --}}
                <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 px-3 pb-2 border-b border-[#F4F7FE]">
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0]">Factura</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-right">Monto</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-center">Estado</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-right">Acción</span>
                </div>
                {{-- Invoice Rows --}}
                <div class="divide-y divide-[#F4F7FE]">
                    @forelse ($invoices as $invoice)
                        @php
                            $isPaid = $invoice->status === 'paid';
                            $isOverdue = $invoice->status === 'unpaid' && $invoice->due_at->isPast();
                        @endphp
                        <div 
                            x-show="currentFilter === 'Todas' || 
                                   (currentFilter === 'Pagadas' && '{{ $invoice->status }}' === 'paid') || 
                                   (currentFilter === 'Pendientes' && '{{ $invoice->status }}' !== 'paid')"
                            class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-4 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors duration-150 -mx-3"
                            x-transition
                        >
                            <div class="flex items-center gap-3 min-w-0">
                                @if ($isPaid)
                                    <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                @elseif ($isOverdue)
                                    <div class="h-9 w-9 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                @else
                                    <div class="h-9 w-9 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    </div>
                                @endif
                                <div class="min-w-0 font-sans">
                                    <span class="text-xs font-extrabold text-[#1B254B] block">{{ $invoice->invoice_number }}</span>
                                    <span class="text-[10px] text-[#A3AED0] font-semibold truncate block">{{ $invoice->description }}</span>
                                    @if ($isPaid)
                                        <span class="text-[9px] font-semibold text-[#A3AED0]">Pagado: {{ $invoice->paid_at ? $invoice->paid_at->format('d M Y') : '' }}</span>
                                    @elseif ($isOverdue)
                                        <span class="text-[9px] font-bold text-red-500">Venció: {{ $invoice->due_at->format('d M Y') }}</span>
                                    @else
                                        <span class="text-[9px] font-bold text-amber-500">Vence: {{ $invoice->due_at->format('d M Y') }}</span>
                                    @endif
                                </div>
                            </div>
                            <span class="text-sm font-black text-[#1B254B] text-right">${{ number_format($invoice->amount, 2) }}</span>
                            @if ($isPaid)
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500 whitespace-nowrap">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>PAGADO
                                </span>
                            @elseif ($isOverdue)
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-[8px] font-extrabold uppercase bg-red-50 text-red-500 whitespace-nowrap">
                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>VENCIDO
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-lg text-[8px] font-extrabold uppercase bg-amber-50 text-amber-500 whitespace-nowrap">
                                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>PENDIENTE
                                </span>
                            @endif
                            <div class="flex items-center justify-end gap-1.5">
                                @if ($isPaid)
                                    <a href="#" class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] hover:bg-[#4318FF] hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Descargar PDF">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/></svg>
                                    </a>
                                @else
                                    <a href="#" class="inline-flex items-center gap-1 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-[9px] font-extrabold py-1.5 px-2.5 rounded-lg transition-all shadow-[0px_4px_10px_rgba(67,24,255,0.20)]">
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>
                                        Pagar
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center bg-[#F4F7FE]/30 rounded-xl">
                            <span class="text-xs font-bold text-[#A3AED0]">No tienes ninguna factura registrada aún.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ─── Right Sidebar (1/3) ────────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Payment Methods Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xs font-extrabold text-[#1B254B] tracking-tight">Métodos de Pago</h3>
                    <button class="text-[9px] font-extrabold text-[#4318FF] hover:text-[#3311CC] transition-colors cursor-pointer">+ Agregar</button>
                </div>
                <div class="space-y-2">
                    {{-- Visa --}}
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-[#F4F7FE] border border-[#E8EDF6]">
                        <div class="h-8 w-12 rounded-lg bg-[#1A1F36] text-white flex items-center justify-center text-[9px] font-black tracking-widest shrink-0">VISA</div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs font-extrabold text-[#1B254B] block">•••• 4242</span>
                            <span class="text-[9px] text-[#A3AED0] font-semibold">Exp: 12/2028</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-[#4318FF]/10 text-[#4318FF]">DEFAULT</span>
                    </div>
                    {{-- PayPal --}}
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white border border-[#F4F7FE] hover:border-[#E8EDF6] transition-colors">
                        <div class="h-8 w-12 rounded-lg bg-[#003087] text-white flex items-center justify-center text-[8px] font-black shrink-0">PayPal</div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs font-extrabold text-[#1B254B] block">pay***@acme.io</span>
                            <span class="text-[9px] text-[#A3AED0] font-semibold">Cuenta conectada</span>
                        </div>
                    </div>
                </div>
                <button class="w-full flex items-center justify-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold py-2.5 px-4 rounded-xl transition-all shadow-[0px_6px_20px_rgba(67,24,255,0.20)] mt-4 cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    Agregar Método de Pago
                </button>
            </div>

            {{-- Billing Summary Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Resumen de Facturación</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-[#A3AED0]">VPS Pro NYC-01</span>
                        <span class="text-[10px] font-extrabold text-[#1B254B]">$24.00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-[#A3AED0]">Dedicado MIA-02</span>
                        <span class="text-[10px] font-extrabold text-[#1B254B]">$89.00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-[#A3AED0]">Object Storage</span>
                        <span class="text-[10px] font-extrabold text-[#1B254B]">$12.00</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[10px] font-semibold text-[#A3AED0]">VPS Dev SFO-03</span>
                        <span class="text-[10px] font-extrabold text-[#1B254B]">$10.00</span>
                    </div>
                    <div class="border-t border-[#F4F7FE] pt-3 flex justify-between items-center">
                        <span class="text-xs font-extrabold text-[#1B254B]">Total Mensual</span>
                        <span class="text-sm font-black text-[#4318FF]">$135.00</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
