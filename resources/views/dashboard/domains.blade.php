@extends('layouts.app')

@section('title', 'Dominios')

@section('content')
<div x-data="{ search: '', showRegisterModal: false, domainQuery: '', domainResults: null, isSearching: false }" class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Dominios</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Administra y renueva tu portafolio de dominios</p>
        </div>
        <div class="flex items-center gap-3">
            <button @click="showRegisterModal = true" class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 overflow-hidden group cursor-pointer">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span class="relative z-10">Registrar Dominio</span>
            </button>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    @php
        $expiringSoonCount = $domains->where('status', 'active')->where('expires_at', '<', now()->addDays(30))->count();
        $expiringSoonDomain = $domains->where('status', 'active')->where('expires_at', '<', now()->addDays(30))->first();
        $expiredCount = $domains->where('status', 'expired')->count();
        $expiredDomain = $domains->where('status', 'expired')->first();
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $domainsCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Total de Dominios</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $activeDomainsCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Activos</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">En producción</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $expiringSoonCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Vencen Pronto</span>
                <span class="text-[9px] font-bold text-[#D97706] block mt-0.5">{{ $expiringSoonDomain ? $expiringSoonDomain->domain_name : 'b' }}</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $expiredCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Expirados</span>
                <span class="text-[9px] font-bold text-red-500 block mt-0.5">{{ $expiredDomain ? $expiredDomain->domain_name : 'Ninguno' }}</span>
            </div>
        </div>
    </div>

    {{-- ─── Main Grid ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── Domain List (2/3) ──────────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Table Card --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Mis Dominios</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Lista completa de dominios registrados</span>
                    </div>
                    <div class="relative">
                        <input x-model="search" type="search" placeholder="Buscar dominio..." class="block rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-2 pl-8 pr-3 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all w-40">
                        <svg class="absolute left-2.5 top-2.5 h-3.5 w-3.5 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <div class="space-y-2">
                    @forelse ($domains as $domain)
                        @php
                            $isExpired = $domain->status === 'expired';
                            $isExpiringSoon = $domain->status === 'active' && $domain->expires_at->isBefore(now()->addDays(30));
                            
                            $wrapperClass = 'flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl transition-all duration-150';
                            if ($isExpired) {
                                $wrapperClass .= ' bg-red-50/40 border border-red-100 hover:border-red-200';
                                $iconClass = 'bg-red-50 text-red-400';
                            } elseif ($isExpiringSoon) {
                                $wrapperClass .= ' bg-amber-50/60 border border-amber-100 hover:border-amber-200';
                                $iconClass = 'bg-amber-100 text-amber-500';
                            } else {
                                $wrapperClass .= ' bg-[#F4F7FE]/50 border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-white';
                                $iconClass = 'bg-emerald-50 text-emerald-500';
                            }
                        @endphp
                        <div 
                            x-show="search === '' || '{{ strtolower($domain->domain_name) }}'.includes(search.toLowerCase())"
                            class="{{ $wrapperClass }}"
                            x-transition
                        >
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="h-9 w-9 rounded-lg {{ $iconClass }} flex items-center justify-center shrink-0">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                                </div>
                                <div class="min-w-0 font-sans">
                                    <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                        <span class="text-xs font-extrabold text-[#1B254B]">{{ $domain->domain_name }}</span>
                                        @if ($isExpired)
                                            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-red-50 text-red-500"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>EXPIRADO</span>
                                        @elseif ($isExpiringSoon)
                                            <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-amber-100 text-amber-600">VENCE PRONTO</span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO</span>
                                        @endif
                                        
                                        @if ($domain->is_locked)
                                            <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                                        @endif
                                        
                                        @if ($domain->auto_renew && !$isExpired)
                                            <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500">AUTO-RENOVAR</span>
                                        @endif
                                    </div>
                                    <div class="flex gap-3 text-[10px] font-semibold text-[#A3AED0]">
                                        @if ($isExpired)
                                            <span class="text-red-500 font-bold">Venció: {{ $domain->expires_at->format('d M Y') }}</span>
                                        @else
                                            <span>Vence: {{ $domain->expires_at->format('d M Y') }}</span>
                                        @endif
                                        <span>{{ $domain->dns_type }}</span>
                                        <span class="font-bold {{ $isExpired ? 'text-[#1B254B]' : ($isExpiringSoon ? 'text-amber-500' : 'text-[#1B254B]') }}">${{ number_format($domain->price, 2) }}/año</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                @if ($isExpired)
                                    <a href="#" class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-[10px] font-extrabold py-1.5 px-3 rounded-lg transition-all shadow-sm">Restaurar</a>
                                @elseif ($isExpiringSoon)
                                    <a href="#" class="inline-flex items-center gap-1 bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-1.5 px-3 rounded-lg transition-all shadow-sm">Renovar</a>
                                @endif
                                <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#4318FF] hover:bg-[#F4F7FE] flex items-center justify-center transition-all cursor-pointer shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center bg-[#F4F7FE]/30 rounded-xl">
                            <span class="text-xs font-bold text-[#A3AED0]">No tienes ningún dominio registrado aún.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ─── Right Sidebar (1/3) ────────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Quick Actions Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Acciones Rápidas</h3>
                <div class="space-y-2">
                    <a href="#" class="group flex items-center justify-between p-3 rounded-xl border border-amber-200 hover:border-amber-400 bg-amber-50/60 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-amber-100 text-amber-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                            </div>
                            <div class="leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Renovar acme.io</span>
                                <span class="text-[10px] text-amber-500 font-bold">Vence en 15 días</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-amber-400 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                    <button @click="showRegisterModal = true" class="w-full text-left group flex items-center justify-between p-3 rounded-xl border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-[#F4F7FE]/50 transition-all select-none cursor-pointer">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg></div>
                            <div class="leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Registrar nuevo dominio</span>
                                <span class="text-[10px] text-[#A3AED0] font-semibold">Buscar disponibilidad</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </button>
                    <a href="#" class="group flex items-center justify-between p-3 rounded-xl border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-[#F4F7FE]/50 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg></div>
                            <div class="leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Transferir dominio</span>
                                <span class="text-[10px] text-[#A3AED0] font-semibold">Mover a Nous</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                    <a href="#" class="group flex items-center justify-between p-3 rounded-xl border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-[#F4F7FE]/50 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.991l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.28z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                            <div class="leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Gestionar DNS</span>
                                <span class="text-[10px] text-[#A3AED0] font-semibold">Editar registros múltiples</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                </div>
            </div>
            <div>
                
            </div>
            {{-- Expiry Alert Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-amber-200">
                <div class="flex items-center gap-2 text-amber-500 mb-3">
                    <svg class="h-5 w-5 shrink-0 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                    <h4 class="text-xs font-black uppercase tracking-wider">Vence Pronto</h4>
                </div>
                <p class="text-xs font-bold text-[#1B254B] leading-relaxed">El dominio <span class="font-extrabold">acme.io</span> vence el <span class="text-amber-500 font-extrabold">15 de Enero, 2025</span>. Activa la auto-renovación para evitar perder el dominio.</p>
                <button class="w-full mt-4 bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-xs font-extrabold py-2.5 px-4 rounded-xl transition-all shadow-sm cursor-pointer">
                    Activar Auto-Renovación
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Registro de Dominios -->
    <div x-show="showRegisterModal" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
         
         <div class="bg-white rounded-[24px] p-6 shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.15)] border border-[#E0E5F2] w-full max-w-lg transform transition-all duration-300"
              @click.away="showRegisterModal = false; domainQuery = ''; domainResults = null; isSearching = false"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95">
              
             <!-- Cabecera -->
             <div class="flex items-center justify-between border-b border-[#F4F7FE] pb-4 mb-4">
                 <div>
                     <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Buscar Nuevo Dominio</h3>
                     <p class="text-[10px] font-semibold text-[#A3AED0] mt-0.5">Verifica disponibilidad de nombres de forma instantánea</p>
                 </div>
                 <button @click="showRegisterModal = false; domainQuery = ''; domainResults = null; isSearching = false" class="text-[#A3AED0] hover:text-[#1B254B] transition-colors cursor-pointer">
                     <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>

             <!-- Formulario -->
             <div class="space-y-4">
                 <div class="relative">
                     <input x-model="domainQuery" 
                            @keydown.enter="if(domainQuery.trim() !== '') { 
                                isSearching = true; 
                                domainResults = null; 
                                setTimeout(() => { 
                                    isSearching = false; 
                                    const cleaned = domainQuery.trim().toLowerCase().replace(/^(https?:\/\/)?(www\.)?/, '').split('.')[0];
                                    domainResults = [
                                        { ext: '.com', available: cleaned !== 'google' && cleaned !== 'facebook', price: 12.99 },
                                        { ext: '.net', available: true, price: 14.50 },
                                        { ext: '.tech', available: cleaned.length > 3, price: 4.99 }
                                    ];
                                }, 1200); 
                            }"
                            type="text" 
                            placeholder="Introduce tu marca o dominio (ej. noushosting)..." 
                            class="w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-4 pr-24 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all">
                     
                     <button @click="if(domainQuery.trim() !== '') { 
                                 isSearching = true; 
                                 domainResults = null; 
                                 setTimeout(() => { 
                                     isSearching = false; 
                                     const cleaned = domainQuery.trim().toLowerCase().replace(/^(https?:\/\/)?(www\.)?/, '').split('.')[0];
                                     domainResults = [
                                         { ext: '.com', available: cleaned !== 'google' && cleaned !== 'facebook', price: 12.99 },
                                         { ext: '.net', available: true, price: 14.50 },
                                         { ext: '.tech', available: cleaned.length > 3, price: 4.99 }
                                     ];
                                 }, 1200); 
                             }"
                             class="absolute right-1.5 top-1.5 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-[10px] font-extrabold px-4 py-2 rounded-lg transition-all cursor-pointer">
                         Buscar
                     </button>
                 </div>

                 <!-- Animación de Búsqueda -->
                 <div x-show="isSearching" class="py-12 flex flex-col items-center justify-center gap-3">
                     <div class="h-8 w-8 rounded-full border-3 border-[#4318FF]/10 border-t-[#4318FF] animate-spin"></div>
                     <span class="text-[10px] font-extrabold text-[#A3AED0]">Consultando servidores WHOIS...</span>
                 </div>

                 <!-- Resultados de Búsqueda -->
                 <div x-show="domainResults && !isSearching" class="space-y-3 font-sans" style="display: none;">
                     <h4 class="text-[10px] font-extrabold uppercase text-[#A3AED0] tracking-wider mb-1">Resultados de disponibilidad</h4>
                     <template x-for="res in domainResults">
                         <div class="flex items-center justify-between p-3.5 rounded-xl border transition-all duration-150"
                              :class="res.available ? 'bg-emerald-50/40 border-emerald-100' : 'bg-red-50/40 border-red-100'">
                              
                             <div class="flex items-center gap-3 min-w-0">
                                 <div class="h-7 w-7 rounded-lg flex items-center justify-center shrink-0"
                                      :class="res.available ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-500'">
                                      <svg x-show="res.available" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                      </svg>
                                      <svg x-show="!res.available" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                      </svg>
                                 </div>
                                 <div class="min-w-0">
                                     <span class="text-xs font-extrabold text-[#1B254B]" x-text="domainQuery.trim().toLowerCase().split('.')[0] + res.ext"></span>
                                     <span class="block text-[8px] font-extrabold uppercase mt-0.5"
                                           :class="res.available ? 'text-emerald-500' : 'text-red-500'"
                                           x-text="res.available ? 'Disponible' : 'No disponible'"></span>
                                 </div>
                             </div>
                             
                             <div class="flex items-center gap-2">
                                 <span class="text-xs font-black text-[#1B254B]" x-text="'$' + res.price.toFixed(2) + '/año'"></span>
                                 <button x-show="res.available" 
                                         @click="alert('¡Compra simulada con éxito! Este dominio se registrará en tu cuenta en la Fase 3 del plan de prácticas.')"
                                         class="bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-[9px] font-extrabold px-3 py-1.5 rounded-lg transition-all cursor-pointer">
                                     Comprar
                                 </button>
                             </div>
                         </div>
                     </template>
                 </div>
             </div>
         </div>
    </div>
</div>
@endsection
