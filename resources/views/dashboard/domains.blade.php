@extends('layouts.app')

@section('title', 'Dominios')

@section('content')
<div class="space-y-6">

    <!-- Encabezado de la Página -->
    <div class="flex flex-col">
        <h1 class="text-2xl font-black text-[#1B254B] tracking-tight">Dominios</h1>
        <p class="text-xs font-bold text-[#A3AED0] mt-1">Administra tu portafolio de dominios</p>
    </div>

    <!-- Rejilla de Tarjetas de Estadísticas de Dominios -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Tarjeta 1: Total Dominios -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono Globo/Tierra -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="6" />
                    <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">5</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Total de Dominios</span>
            </div>
        </div>

        <!-- Tarjeta 2: Activos -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono de Check en Verde -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">3</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Activos</span>
            </div>
        </div>

        <!-- Tarjeta 3: Vencen Pronto -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <!-- Icono Advertencia -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">1</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Vencen Pronto</span>
                <span class="text-[9px] font-bold text-amber-500 mt-0.5">acme.io — 15 días</span>
            </div>
        </div>

        <!-- Tarjeta 4: Expirados -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                <!-- Icono Cerrar/Cruz -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">1</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Expirados</span>
                <span class="text-[9px] font-bold text-red-500 mt-0.5">oldproject.net</span>
            </div>
        </div>
    </div>

    <!-- Rejilla Principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Lista de Dominios -->
        <div class="lg:col-span-2 space-y-3">
            <!-- Dominios 1: acme.io -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Globo (Amarillo/Naranja) -->
                    <div class="h-10 w-10 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                    </div>

                    <!-- Detalles del Dominio -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">acme.io</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-amber-500/10 text-amber-500">VENCE PRONTO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Vence: 2025-01-15</span>
                            <span>🛡️ DNS Personalizado</span>
                        </div>
                    </div>
                </div>

                <!-- Renovación & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$12.99/año</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-1.5 px-3.5 rounded-full transition-all shadow-sm">
                            Renovar
                        </a>
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dominios 2: acme-labs.com -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Globo (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                    </div>

                    <!-- Detalles del Dominio -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">acme-labs.com</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">AUTO-RENOVAR</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Vence: 2025-08-22</span>
                            <span>🛡️ DNS Personalizado</span>
                        </div>
                    </div>
                </div>

                <!-- Renovación & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$14.99/año</span>
                    <div class="flex items-center gap-2">
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dominios 3: shop.acme.io -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Globo (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                    </div>

                    <!-- Detalles del Dominio -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">shop.acme.io</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">AUTO-RENOVAR</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Vence: 2026-03-10</span>
                            <span>🛡️ DNS Personalizado</span>
                        </div>
                    </div>
                </div>

                <!-- Renovación & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$12.99/año</span>
                    <div class="flex items-center gap-2">
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dominios 4: acme.dev -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Globo (Verde) -->
                    <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                    </div>

                    <!-- Detalles del Dominio -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">acme.dev</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#4318FF]/10 text-[#4318FF]">BLOQUEADO</span>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">AUTO-RENOVAR</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Vence: 2025-11-05</span>
                            <span>🛡️ DNS Personalizado</span>
                        </div>
                    </div>
                </div>

                <!-- Renovación & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$19.99/año</span>
                    <div class="flex items-center gap-2">
                        <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Dominios 5: oldproject.net -->
            <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
                <div class="flex items-center gap-4 min-w-0">
                    <!-- Icono Globo (Rojo) -->
                    <div class="h-10 w-10 rounded-full bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                    </div>

                    <!-- Detalles del Dominio -->
                    <div class="flex flex-col min-w-0">
                        <div class="flex flex-wrap items-center gap-2">
                            <h3 class="text-sm font-extrabold text-[#1B254B]">oldproject.net</h3>
                            <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-red-500/10 text-red-500">EXPIRADO</span>
                        </div>
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                            <span>📅 Venció: 2024-10-01</span>
                            <span>🛡️ DNS Personalizado</span>
                        </div>
                    </div>
                </div>

                <!-- Renovación & Acciones -->
                <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                    <span class="text-sm font-black text-[#1B254B]">$11.99/año</span>
                    <div class="flex items-center gap-2">
                        <a href="#" class="bg-red-500 hover:bg-red-600 active:scale-95 text-white text-[10px] font-extrabold py-1.5 px-3.5 rounded-full transition-all shadow-sm">
                            Restaurar
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

        <!-- Columna Lateral Izquierda (Quick Actions y Alerta) -->
        <div class="lg:col-span-1 space-y-6">

            <!-- Tarjeta Quick Actions -->
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50">
                <h3 class="text-sm font-black text-[#1B254B] mb-4">Acciones Rápidas</h3>
                <div class="space-y-3">
                    <!-- Acción 1: Renew acme.io (Gold Border) -->
                    <a href="#" class="group flex items-center justify-between p-3.5 rounded-xl border border-amber-500/50 hover:border-amber-500 bg-amber-500/5 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                            </div>
                            <div class="flex flex-col min-w-0 leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">Renovar acme.io</span>
                                <span class="text-[10px] text-amber-500 font-bold mt-0.5">Vence en 15 días</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>

                    <!-- Acción 2: Register new domain -->
                    <a href="#" class="group flex items-center justify-between p-3.5 rounded-xl border border-[#F4F7FE] hover:border-[#E0E5F2] hover:bg-[#F4F7FE]/30 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                            <div class="flex flex-col min-w-0 leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">Registrar nuevo dominio</span>
                                <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Buscar disponibilidad</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>

                    <!-- Acción 3: Transfer domain in -->
                    <a href="#" class="group flex items-center justify-between p-3.5 rounded-xl border border-[#F4F7FE] hover:border-[#E0E5F2] hover:bg-[#F4F7FE]/30 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                            <div class="flex flex-col min-w-0 leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">Transferir dominio</span>
                                <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Mover a Nous</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>

                    <!-- Acción 4: Bulk manage DNS -->
                    <a href="#" class="group flex items-center justify-between p-3.5 rounded-xl border border-[#F4F7FE] hover:border-[#E0E5F2] hover:bg-[#F4F7FE]/30 transition-all select-none">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.991l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.28z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col min-w-0 leading-tight">
                                <span class="text-xs font-extrabold text-[#1B254B]">Gestionar DNS</span>
                                <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Editar registros múltiples</span>
                            </div>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Tarjeta Alerta Expiring Soon -->
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-amber-200 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 text-amber-500">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <h4 class="text-xs font-black uppercase tracking-wider">Vence Pronto</h4>
                    </div>
                    <p class="text-xs font-bold text-[#1B254B] leading-relaxed mt-3">
                        El dominio <span class="font-extrabold">acme.io</span> vence el <span class="text-amber-500 font-extrabold">15 de Enero, 2025</span>. Activa la auto-renovación para evitar perder el dominio.
                    </p>
                </div>
                <button class="w-full bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-xs font-extrabold py-3 px-4 rounded-xl transition-all shadow-sm mt-5 cursor-pointer">
                    Activar Auto-Renovación
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
