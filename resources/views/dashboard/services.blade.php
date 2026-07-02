@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
<div class="space-y-6">

    <!-- Encabezado de la Página -->
    <div class="flex flex-col">
        <h1 class="text-2xl font-black text-[#1B254B] tracking-tight">Mis Servicios</h1>
        <p class="text-xs font-bold text-[#A3AED0] mt-1">Administra tu infraestructura de hosting</p>
    </div>

    <!-- Rejilla de Tarjetas de Estadísticas de Servicios -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Tarjeta 1: Total Servicios -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono de Servidor en Verde -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">5</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Servicios Totales</span>
                <span class="text-[9px] font-bold text-[#A3AED0] mt-0.5">4 activos, 1 suspendido</span>
            </div>
        </div>

        <!-- Tarjeta 2: Avg Uptime -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <!-- Icono Ondulación/Uptime -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">99.97%</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Uptime Promedio</span>
                <span class="text-[9px] font-bold text-[#A3AED0] mt-0.5">Últimos 30 días</span>
            </div>
        </div>

        <!-- Tarjeta 3: CPU más Alto -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                <!-- Icono CPU -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm11.586-1.586l.707.707a3 3 0 01.879 2.122L16.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM12 3v1.5m0 15V21m-9-9h1.5m15 0H21m-3.938-6.062l-1.062 1.062m-9.938 9.938l-1.062 1.062m12.062 0l1.062 1.062M5.062 5.062l1.062 1.062M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">87%</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">CPU más Alto</span>
                <span class="text-[9px] font-bold text-red-500 mt-0.5">VPS NYC-01 - alerta</span>
            </div>
        </div>

        <!-- Tarjeta 4: Coste Mensual -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.01] duration-200">
            <div class="h-12 w-12 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <!-- Icono de Pago/Dólar -->
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727l-.214-.113a3.181 3.181 0 00-3.572 0L9 8.09a3.181 3.181 0 00-1.5 2.727v2.364c0 1.25.75 2.364 1.5 2.727z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-[22px] font-black text-[#1B254B] leading-none">$140</span>
                <span class="text-[11px] font-bold text-[#A3AED0] mt-1">Costo Mensual</span>
                <span class="text-[9px] font-bold text-[#A3AED0] mt-0.5">Todos los servicios</span>
            </div>
        </div>
    </div>

    <!-- Filtros de Categorías -->
    <div class="flex flex-wrap gap-2 py-1 select-none">
        <button class="bg-[#4318FF] text-white px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Todos</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Activos</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Suspendidos</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">VPS</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Dedicados</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Compartidos</button>
        <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Almacenamiento</button>
    </div>

    <!-- Lista de Servicios (Horizontal Cards Stack) -->
    <div class="space-y-3">
        <!-- Servicio 1: VPS Pro -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
            <div class="flex items-center gap-4 min-w-0">
                <!-- Icono Servidor (Verde) -->
                <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                    </svg>
                </div>
                
                <!-- Detalles Principales -->
                <div class="flex flex-col min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-sm font-extrabold text-[#1B254B]">VPS Pro — NYC-01</h3>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#4318FF]/10 text-[#4318FF]">VPS</span>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                        <span class="flex items-center gap-1">
                            📍 Nueva York, EE.UU.
                        </span>
                        <span>🌐 198.51.100.42</span>
                        <span>📅 Vence: 2025-01-15</span>
                        <span class="text-emerald-500 flex items-center gap-0.5">
                            ↑ 99.98%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Precios & Acciones -->
            <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                <span class="text-sm font-black text-[#1B254B]">$24/mes</span>
                <!-- Panel de Botones Rápidos -->
                <div class="flex items-center gap-2">
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer" title="Reiniciar">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors cursor-pointer" title="Apagar/Encender">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Servicio 2: Dedicado -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
            <div class="flex items-center gap-4 min-w-0">
                <!-- Icono Servidor (Verde) -->
                <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                    </svg>
                </div>
                
                <!-- Detalles Principales -->
                <div class="flex flex-col min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-sm font-extrabold text-[#1B254B]">Dedicado — MIA-02</h3>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#7A5CFF]/10 text-[#7A5CFF]">DEDICADO</span>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                        <span class="flex items-center gap-1">
                            📍 Miami, EE.UU.
                        </span>
                        <span>🌐 203.0.113.88</span>
                        <span>📅 Vence: 2025-02-08</span>
                        <span class="text-emerald-500 flex items-center gap-0.5">
                            ↑ 100%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Precios & Acciones -->
            <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                <span class="text-sm font-black text-[#1B254B]">$89/mes</span>
                <!-- Panel de Botones Rápidos -->
                <div class="flex items-center gap-2">
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer" title="Reiniciar">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors cursor-pointer" title="Apagar/Encender">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Servicio 3: Compartido -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
            <div class="flex items-center gap-4 min-w-0">
                <!-- Icono Servidor (Naranja) -->
                <div class="h-10 w-10 rounded-full bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                    </svg>
                </div>
                
                <!-- Detalles Principales -->
                <div class="flex flex-col min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-sm font-extrabold text-[#1B254B]">Compartido — EU-Lite</h3>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-amber-500/10 text-amber-500">COMPARTIDO</span>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-red-500/10 text-red-500">SUSPENDIDO</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                        <span class="flex items-center gap-1">
                            📍 Fráncfort, Alemania
                        </span>
                        <span>🌐 192.0.2.77</span>
                        <span>📅 Vence: 2024-12-31</span>
                    </div>
                </div>
            </div>

            <!-- Precios & Acciones -->
            <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                <span class="text-sm font-black text-[#1B254B]">$5/mes</span>
                <!-- Botón Reactivar -->
                <div class="flex items-center gap-2">
                    <a href="#" class="bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-1.5 px-3.5 rounded-full transition-all shadow-sm">
                        Reactivar
                    </a>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Servicio 4: Almacenamiento -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
            <div class="flex items-center gap-4 min-w-0">
                <!-- Icono Disco (Verde) -->
                <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75" />
                    </svg>
                </div>
                
                <!-- Detalles Principales -->
                <div class="flex flex-col min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-sm font-extrabold text-[#1B254B]">Object Storage</h3>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ALMACENAMIENTO</span>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                        <span class="flex items-center gap-1">
                            📍 Anycast
                        </span>
                        <span>🌐 Anycast</span>
                        <span>📅 Vence: 2025-03-20</span>
                        <span class="text-emerald-500 flex items-center gap-0.5">
                            ↑ 99.99%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Precios & Acciones -->
            <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                <span class="text-sm font-black text-[#1B254B]">$12/mes</span>
                <!-- Panel de Botones Rápidos -->
                <div class="flex items-center gap-2">
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer" title="Reiniciar">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors cursor-pointer" title="Apagar/Encender">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Servicio 5: VPS Dev -->
        <div class="bg-white rounded-[20px] p-4 shadow-[0px_18px_40px_rgba(112,144,176,0.04)] border border-white/50 flex flex-col md:flex-row md:items-center justify-between gap-4 transition-all hover:scale-[1.005] duration-200">
            <div class="flex items-center gap-4 min-w-0">
                <!-- Icono Servidor (Verde) -->
                <div class="h-10 w-10 rounded-full bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                    </svg>
                </div>
                
                <!-- Detalles Principales -->
                <div class="flex flex-col min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-sm font-extrabold text-[#1B254B]">VPS Dev — SFO-03</h3>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-[#4318FF]/10 text-[#4318FF]">VPS</span>
                        <span class="px-2.5 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-500/10 text-emerald-500">ACTIVO</span>
                    </div>
                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] font-bold text-[#A3AED0] mt-1">
                        <span class="flex items-center gap-1">
                            📍 San Francisco, EE.UU.
                        </span>
                        <span>🌐 203.0.113.11</span>
                        <span>📅 Vence: 2025-04-10</span>
                        <span class="text-emerald-500 flex items-center gap-0.5">
                            ↑ 99.91%
                        </span>
                    </div>
                </div>
            </div>

            <!-- Precios & Acciones -->
            <div class="flex items-center justify-between md:justify-end gap-6 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE]">
                <span class="text-sm font-black text-[#1B254B]">$10/mes</span>
                <!-- Panel de Botones Rápidos -->
                <div class="flex items-center gap-2">
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer" title="Reiniciar">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors cursor-pointer" title="Apagar/Encender">
                        <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                    </button>
                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE] flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
