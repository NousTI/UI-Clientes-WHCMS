@extends('layouts.app')

@section('title', 'Dominios')

@section('content')
<div class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Dominios</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Administra y renueva tu portafolio de dominios</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="#" class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span class="relative z-10">Registrar Dominio</span>
            </a>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">5</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Total de Dominios</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">3</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Activos</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">Con auto-renovación</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">1</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Vencen Pronto</span>
                <span class="text-[9px] font-bold text-amber-500 block mt-0.5">acme.io — 15 días</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">1</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Expirados</span>
                <span class="text-[9px] font-bold text-red-500 block mt-0.5">oldproject.net</span>
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
                        <input type="search" placeholder="Buscar dominio..." class="block rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-2 pl-8 pr-3 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all w-40">
                        <svg class="absolute left-2.5 top-2.5 h-3.5 w-3.5 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                </div>

                <div class="space-y-2">
                    {{-- acme.io — VENCE PRONTO --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-amber-50/60 border border-amber-100 hover:border-amber-200 transition-all duration-150">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-9 w-9 rounded-lg bg-amber-100 text-amber-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                    <span class="text-xs font-extrabold text-[#1B254B]">acme.io</span>
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-amber-100 text-amber-600">VENCE PRONTO</span>
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                                </div>
                                <div class="flex gap-3 text-[10px] font-semibold text-[#A3AED0]">
                                    <span>Vence: 15 Ene 2025</span>
                                    <span>DNS Personalizado</span>
                                    <span class="font-bold text-amber-500">$12.99/año</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="#" class="inline-flex items-center gap-1 bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-1.5 px-3 rounded-lg transition-all shadow-sm">Renovar</a>
                            <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#4318FF] hover:bg-white flex items-center justify-center transition-all cursor-pointer"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
                        </div>
                    </div>
                    <div>
                        
                    </div>

                    {{-- acme-labs.com — ACTIVO --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-[#F4F7FE]/50 border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-white transition-all duration-150">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                    <span class="text-xs font-extrabold text-[#1B254B]">acme-labs.com</span>
                                    <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO</span>
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500">AUTO-RENOVAR</span>
                                </div>
                                <div class="flex gap-3 text-[10px] font-semibold text-[#A3AED0]">
                                    <span>Vence: 22 Ago 2025</span>
                                    <span>DNS Personalizado</span>
                                    <span class="font-bold text-[#1B254B]">$14.99/año</span>
                                </div>
                            </div>
                        </div>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#4318FF] hover:bg-[#F4F7FE] flex items-center justify-center transition-all cursor-pointer shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
                    </div>

                    {{-- shop.acme.io — ACTIVO --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-[#F4F7FE]/50 border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-white transition-all duration-150">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-9 w-9 rounded-lg bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                    <span class="text-xs font-extrabold text-[#1B254B]">shop.acme.io</span>
                                    <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO</span>
                                    <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500">AUTO-RENOVAR</span>
                                </div>
                                <div class="flex gap-3 text-[10px] font-semibold text-[#A3AED0]">
                                    <span>Vence: 10 Mar 2026</span>
                                    <span>DNS Personalizado</span>
                                    <span class="font-bold text-[#1B254B]">$12.99/año</span>
                                </div>
                            </div>
                        </div>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#4318FF] hover:bg-[#F4F7FE] flex items-center justify-center transition-all cursor-pointer shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
                    </div>

                                        {{-- oldproject.net — EXPIRADO --}}
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-red-50/40 border border-red-100 hover:border-red-200 transition-all duration-150">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-9 w-9 rounded-lg bg-red-50 text-red-400 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                    <span class="text-xs font-extrabold text-[#1B254B]">oldproject.net</span>
                                    <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase bg-red-50 text-red-500"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>EXPIRADO</span>
                                </div>
                                <div class="flex gap-3 text-[10px] font-semibold text-[#A3AED0]">
                                    <span class="text-red-500 font-bold">Venció: 01 Oct 2024</span>
                                    <span>DNS Personalizado</span>
                                    <span class="font-bold text-[#1B254B]">$11.99/año</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="#" class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-[10px] font-extrabold py-1.5 px-3 rounded-lg transition-all shadow-sm">Restaurar</a>
                            <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-all cursor-pointer"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg></button>
                        </div>
                    </div>
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
                    <a href="#" class="group flex items-center justify-between p-3 rounded-xl border border-[#F4F7FE] hover:border-[#4318FF]/20 hover:bg-[#F4F7FE]/50 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg></div>
                            <div class="leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Registrar nuevo dominio</span>
                                <span class="text-[10px] text-[#A3AED0] font-semibold">Buscar disponibilidad</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
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
</div>
@endsection
