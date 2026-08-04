@extends('layouts.app')

@section('title', 'Mis Servicios')

@section('content')
<div x-data="{ 
    currentFilter: 'todos', 
    showConsoleModal: false, 
    selectedVps: null, 
    vpsPowerState: 'on', 
    isPowerLoading: false, 
    powerLoadingAction: '', 
    powerLoadingMessage: '', 
    powerProgress: 0,
    consoleLog: [],
    runSimulatedAction(action) {
        if (this.isPowerLoading) return;
        
        if (action === 'restart') {
            if (!confirm('¿Estás seguro de que deseas reiniciar este VPS?')) return;
            this.isPowerLoading = true;
            this.powerLoadingAction = 'restart';
            this.powerLoadingMessage = 'Reiniciando VPS...';
            this.powerProgress = 0;
            this.consoleLog.push('[SISTEMA] Enviando señal de reinicio (SIGTERM)...');
            this.consoleLog.push('[SISTEMA] Deteniendo daemon de Docker y Nginx...');
            
            let interval = setInterval(() => {
                this.powerProgress += 10;
                if (this.powerProgress >= 100) {
                    clearInterval(interval);
                    this.isPowerLoading = false;
                    this.vpsPowerState = 'on';
                    this.consoleLog.push('[OK] Servidor VPS reiniciado correctamente.');
                    this.consoleLog.push('[OK] Consola TTY1 lista para usar.');
                }
            }, 250);
        } else if (action === 'off') {
            if (!confirm('¿Estás seguro de que deseas apagar este VPS?')) return;
            this.isPowerLoading = true;
            this.powerLoadingAction = 'off';
            this.powerLoadingMessage = 'Apagando VPS...';
            this.powerProgress = 0;
            this.consoleLog.push('[SISTEMA] Ejecutando apagado seguro (ACPI shutdown)...');
            
            let interval = setInterval(() => {
                this.powerProgress += 20;
                if (this.powerProgress >= 100) {
                    clearInterval(interval);
                    this.isPowerLoading = false;
                    this.vpsPowerState = 'off';
                    this.consoleLog.push('[ALERTA] El servidor se encuentra APAGADO.');
                }
            }, 200);
        } else if (action === 'on') {
            this.isPowerLoading = true;
            this.powerLoadingAction = 'on';
            this.powerLoadingMessage = 'Encendiendo VPS...';
            this.powerProgress = 0;
            this.consoleLog.push('[SISTEMA] Iniciando alimentación física del nodo...');
            
            let interval = setInterval(() => {
                this.powerProgress += 20;
                if (this.powerProgress >= 100) {
                    clearInterval(interval);
                    this.isPowerLoading = false;
                    this.vpsPowerState = 'on';
                    this.consoleLog.push('[OK] El servidor se encuentra ENCENDIDO.');
                    this.consoleLog.push('[OK] Consola TTY1 activa.');
                }
            }, 200);
        }
    }
}" class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Mis Servicios</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Administra y monitorea tu infraestructura</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="#" class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span class="relative z-10">Nuevo Servicio</span>
            </a>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    @php
        $maxCpuService = $services->sortByDesc('cpu_usage')->first();
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Total Servicios --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $servicesCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Servicios Totales</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">{{ $activeServicesCount }} activos · {{ $suspendedServicesCount }} {{ Str::plural('suspendido', $suspendedServicesCount) }}</span>
            </div>
        </div>
        {{-- Uptime --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">99.98%</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Uptime Promedio</span>
                <span class="text-[9px] font-bold text-[#A3AED0] block mt-0.5">Últimos 30 días</span>
            </div>
        </div>
        {{-- CPU Alert --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            @if ($maxCpuService && $maxCpuService->cpu_usage >= 80)
                <div class="h-12 w-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm11.586-1.586l.707.707a3 3 0 01.879 2.122L16.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM12 3v1.5m0 15V21m-9-9h1.5m15 0H21M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z"/></svg>
                </div>
                <div>
                    <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $maxCpuService->cpu_usage }}%</span>
                    <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">CPU más Alto</span>
                    <span class="text-[9px] font-bold text-red-500 block mt-0.5">{{ $maxCpuService->name }} — alerta</span>
                </div>
            @else
                <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $maxCpuService ? $maxCpuService->cpu_usage : 0 }}%</span>
                    <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">CPU más Alto</span>
                    <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">Sistemas estables</span>
                </div>
            @endif
        </div>
        {{-- Monthly Cost --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727l-.214-.113a3.181 3.181 0 00-3.572 0L9 8.09a3.181 3.181 0 00-1.5 2.727v2.364c0 1.25.75 2.364 1.5 2.727z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">${{ number_format($monthlyCost, 2) }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Costo Mensual</span>
                <span class="text-[9px] font-bold text-[#A3AED0] block mt-0.5">Servicios activos</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── Service List (2/3) ───────────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Filter Pills --}}
            <div class="flex flex-wrap gap-2 select-none">
                <button 
                    @click="currentFilter = 'todos'"
                    :class="currentFilter === 'todos' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >Todos</button>
                <button 
                    @click="currentFilter = 'activos'"
                    :class="currentFilter === 'activos' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >Activos</button>
                <button 
                    @click="currentFilter = 'suspendidos'"
                    :class="currentFilter === 'suspendidos' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >Suspendidos</button>
                <button 
                    @click="currentFilter = 'vps'"
                    :class="currentFilter === 'vps' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >VPS</button>
                <button 
                    @click="currentFilter = 'dedicados'"
                    :class="currentFilter === 'dedicados' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >Dedicados</button>
                <button 
                    @click="currentFilter = 'compartidos'"
                    :class="currentFilter === 'compartidos' ? 'bg-[#4318FF] text-white shadow-[0px_4px_12px_rgba(67,24,255,0.20)]' : 'bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30'"
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer border"
                >Compartidos</button>
            </div>

            @forelse ($services as $service)
                @php
                    $iconColorClass = match($service->type) {
                        'vps' => 'bg-[#4318FF]/8 text-[#4318FF]',
                        'dedicado' => 'bg-[#7A5CFF]/8 text-[#7A5CFF]',
                        default => 'bg-[#10B981]/8 text-[#10B981]',
                    };
                    $badgeColorClass = match($service->type) {
                        'vps' => 'bg-[#4318FF]/10 text-[#4318FF]',
                        'dedicado' => 'bg-[#7A5CFF]/10 text-[#7A5CFF]',
                        default => 'bg-[#10B981]/10 text-[#10B981]',
                    };
                    $cpuBarColor = match(true) {
                        $service->cpu_usage >= 80 => 'bg-red-400',
                        $service->cpu_usage >= 50 => 'bg-amber-400',
                        default => 'bg-emerald-400',
                    };
                    $cpuTextColor = match(true) {
                        $service->cpu_usage >= 80 => 'text-red-500',
                        $service->cpu_usage >= 50 => 'text-amber-500',
                        default => 'text-emerald-500',
                    };
                @endphp
                <div 
                    x-show="currentFilter === 'todos' || 
                           (currentFilter === 'activos' && '{{ $service->status }}' === 'active') || 
                           (currentFilter === 'suspendidos' && '{{ $service->status }}' === 'suspended') || 
                           (currentFilter === 'vps' && '{{ $service->type }}' === 'vps') || 
                           (currentFilter === 'dedicados' && '{{ $service->type }}' === 'dedicado') || 
                           (currentFilter === 'compartidos' && '{{ $service->type }}' === 'compartido')"
                    class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border {{ $service->status === 'suspended' ? 'border-red-100/60' : 'border-white/50' }} hover:border-[#4318FF]/20 transition-all duration-200 hover:shadow-[0px_18px_40px_rgba(67,24,255,0.08)]"
                    x-transition
                >
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-center gap-4 min-w-0 w-full">
                            <div class="h-11 w-11 rounded-xl {{ $iconColorClass }} flex items-center justify-center shrink-0">
                                @if ($service->type === 'vps')
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5"/></svg>
                                @elseif ($service->type === 'dedicado')
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5"/></svg>
                                @else
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                @endif
                            </div>
                            <div class="min-w-0 w-full font-sans">
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <h3 class="text-sm font-extrabold text-[#1B254B]">{{ $service->name }}</h3>
                                    <span class="px-2 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase {{ $badgeColorClass }}">{{ $service->type }}</span>
                                    @if ($service->status === 'active')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-emerald-50 text-emerald-500"><span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>ACTIVO</span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[8px] font-extrabold tracking-wider uppercase bg-red-50 text-red-500"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>SUSPENDIDO</span>
                                    @endif
                                </div>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-[10px] font-semibold text-[#A3AED0]">
                                    <span class="flex items-center gap-1"><svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>{{ $service->location }}</span>
                                    <span>{{ $service->ip_address }}</span>
                                    @if ($service->status === 'active')
                                        <span>Vence: {{ $service->expires_at->format('d M Y') }}</span>
                                    @else
                                        <span class="text-red-500 font-bold">Venció: {{ $service->expires_at->format('d M Y') }}</span>
                                    @endif
                                    <span class="font-bold text-emerald-500">↑ {{ $service->uptime }}%</span>
                                </div>
                                @if ($service->status === 'active')
                                    <div class="mt-2.5">
                                        <div class="flex justify-between text-[9px] font-bold text-[#A3AED0] mb-1"><span>CPU</span><span class="{{ $cpuTextColor }}">{{ $service->cpu_usage }}%</span></div>
                                        <div class="h-1.5 bg-[#F4F7FE] rounded-full overflow-hidden"><div class="h-full {{ $cpuBarColor }} rounded-full" style="width:{{ $service->cpu_usage }}%"></div></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center justify-between md:justify-end gap-4 shrink-0 border-t md:border-t-0 pt-3 md:pt-0 border-[#F4F7FE] w-full md:w-auto">
                            <span class="text-sm font-black text-[#1B254B]">${{ number_format($service->price, 0) }}<span class="text-[10px] text-[#A3AED0] font-bold">/{{ $service->billing_cycle }}</span></span>
                            <div class="flex items-center gap-1.5">
                                @if ($service->status === 'active')
                                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-[#4318FF] hover:bg-[#F4F7FE] flex items-center justify-center transition-all cursor-pointer" title="Reiniciar"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg></button>
                                    <button class="h-8 w-8 rounded-lg text-[#A3AED0] hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-all cursor-pointer" title="Apagar"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9"/></svg></button>
                                    <button 
                                        @click="if ('{{ $service->type }}' === 'vps') { 
                                            selectedVps = {{ json_encode($service) }}; 
                                            showConsoleModal = true; 
                                            vpsPowerState = 'on'; 
                                            consoleLog = [
                                                '[SISTEMA] Conectando a la consola serie VPS...',
                                                '[OK] Conexión establecida con la IP {{ $service->ip_address }}',
                                                '[OK] Consola TTY1 lista y autorizada.'
                                            ]; 
                                        } else { 
                                            alert('La consola de administración interactiva solo está disponible para servidores VPS.'); 
                                        }"
                                        class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] hover:bg-[#4318FF] hover:text-white flex items-center justify-center transition-all cursor-pointer" 
                                        title="Gestionar"
                                    >
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                        </svg>
                                    </button>
                                @else
                                    <a href="#" class="inline-flex items-center gap-1.5 bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-2 px-3.5 rounded-xl transition-all shadow-sm">
                                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                                        Reactivar
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-[20px] p-8 text-center shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                    <span class="text-xs font-bold text-[#A3AED0]">No tienes ningún servicio contratado aún.</span>
                </div>
            @endforelse
        </div>

        {{-- ─── Right Sidebar (1/3) ────────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Promo Card --}}
            <div class="bg-gradient-to-br from-[#868CFF] via-[#5C5CFF] to-[#4318FF] rounded-[20px] p-5 text-white relative overflow-hidden shadow-[0px_18px_40px_rgba(67,24,255,0.18)] select-none group">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/8 to-white/0 transform skew-y-12 transition-transform duration-700 group-hover:translate-x-full"></div>
                <div class="relative z-10">
                    <span class="inline-block text-[8px] font-extrabold uppercase tracking-wider bg-white/20 px-2 py-0.5 rounded-md mb-2">¡Oferta Especial! 🚀</span>
                    <h4 class="text-xs font-black leading-snug mb-3">Duplica tus recursos Cloud GPU con 50% de descuento este mes</h4>
                    <a href="#" class="inline-flex items-center gap-1.5 bg-white/20 hover:bg-white/30 text-white text-[10px] font-extrabold px-3 py-1.5 rounded-lg transition-all">
                        Ver oferta
                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Resource Summary Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Resumen de Recursos</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-[10px] font-bold text-[#A3AED0] mb-1.5"><span>CPU Total</span><span class="text-[#1B254B]">62% usado</span></div>
                        <div class="h-2 bg-[#F4F7FE] rounded-full overflow-hidden"><div class="h-full bg-gradient-to-r from-[#4318FF] to-[#868CFF] rounded-full" style="width:62%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[10px] font-bold text-[#A3AED0] mb-1.5"><span>RAM Total</span><span class="text-[#1B254B]">45% usado</span></div>
                        <div class="h-2 bg-[#F4F7FE] rounded-full overflow-hidden"><div class="h-full bg-emerald-400 rounded-full" style="width:45%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[10px] font-bold text-[#A3AED0] mb-1.5"><span>Disco Total</span><span class="text-amber-500">78% usado</span></div>
                        <div class="h-2 bg-[#F4F7FE] rounded-full overflow-hidden"><div class="h-full bg-amber-400 rounded-full" style="width:78%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-[10px] font-bold text-[#A3AED0] mb-1.5"><span>Ancho de Banda</span><span class="text-[#1B254B]">23% usado</span></div>
                        <div class="h-2 bg-[#F4F7FE] rounded-full overflow-hidden"><div class="h-full bg-[#4318FF]/40 rounded-full" style="width:23%"></div></div>
                    </div>
                </div>
            </div>
            
            {{-- Alert CPU Card --}}
            @if ($maxCpuService && $maxCpuService->cpu_usage >= 80)
                <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-red-100/80">
                    <div class="flex items-center gap-2 text-red-500 mb-3">
                        <svg class="h-5 w-5 shrink-0 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                        <h4 class="text-xs font-black uppercase tracking-wider">Alerta de CPU</h4>
                    </div>
                    <p class="text-xs font-bold text-[#1B254B] leading-relaxed font-sans">El servidor <span class="font-extrabold">{{ $maxCpuService->name }}</span> tiene un uso de CPU del <span class="text-red-500 font-extrabold">{{ $maxCpuService->cpu_usage }}%</span>. Considera escalar o reiniciar el servicio.</p>
                    <button class="w-full mt-4 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-xs font-extrabold py-2.5 px-4 rounded-xl transition-all cursor-pointer shadow-[0px_4px_12px_rgba(239,68,68,0.20)]">
                        Ver Detalles
                    </button>
                </div>
            @else
                <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-emerald-100">
                    <div class="flex items-center gap-2 text-emerald-500 mb-3">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <h4 class="text-xs font-black uppercase tracking-wider">Sistemas Estables</h4>
                    </div>
                    <p class="text-xs font-bold text-[#1B254B] leading-relaxed font-sans">Todos tus servicios están funcionando dentro de los parámetros normales de rendimiento. No se requiere ninguna acción.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Consola VPS Premium -->
    <div x-show="showConsoleModal" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
         
         <div class="bg-white rounded-[24px] shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.15)] border border-[#E0E5F2] w-full max-w-xl overflow-hidden transform transition-all duration-300 flex flex-col max-h-[85vh]"
              @click.away="if (!isPowerLoading) showConsoleModal = false"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95">
              
             <!-- Cabecera -->
             <div class="p-6 pb-4 border-b border-[#F4F7FE] flex items-center justify-between shrink-0 font-sans">
                 <div class="flex items-center gap-3">
                     <div class="h-9 w-9 rounded-lg bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center">
                         <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm11.586-1.586l.707.707a3 3 0 01.879 2.122L16.5 21m0 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM12 3v1.5m0 15V21m-9-9h1.5m15 0H21M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z"/>
                         </svg>
                     </div>
                     <div>
                         <h3 class="text-sm font-extrabold text-[#1B254B]" x-text="selectedVps ? selectedVps.name : 'Consola VPS'"></h3>
                         <div class="flex items-center gap-1.5 text-[9px] font-bold mt-0.5">
                             <span x-text="selectedVps ? selectedVps.ip_address : ''" class="text-[#A3AED0]"></span>
                             <span class="text-[#A3AED0]">•</span>
                             <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase"
                                   :class="vpsPowerState === 'on' ? 'bg-emerald-50 text-emerald-500' : 'bg-red-50 text-red-500'">
                                 <span class="h-1 w-1 rounded-full" :class="vpsPowerState === 'on' ? 'bg-emerald-500' : 'bg-red-500'"></span>
                                 <span x-text="vpsPowerState === 'on' ? 'Encendido' : 'Apagado'"></span>
                             </span>
                         </div>
                     </div>
                 </div>
                 <button @click="showConsoleModal = false" :disabled="isPowerLoading" class="text-[#A3AED0] hover:text-[#1B254B] transition-colors cursor-pointer disabled:opacity-50">
                     <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>

             <!-- Contenido Consola TTY -->
             <div class="p-6 bg-slate-950 font-mono text-xs text-slate-300 flex-1 overflow-y-auto space-y-2 min-h-[180px] max-h-[300px]">
                 <!-- Mostrar carga si la hay -->
                 <div x-show="isPowerLoading" class="flex flex-col gap-2 p-3 bg-slate-900/60 rounded-xl border border-white/5 mb-2">
                     <div class="flex items-center justify-between text-[10px] text-white font-extrabold font-sans">
                         <span x-text="powerLoadingMessage"></span>
                         <span x-text="powerProgress + '%'"></span>
                     </div>
                     <div class="h-1.5 bg-slate-950 rounded-full overflow-hidden">
                         <div class="h-full bg-[#4318FF] rounded-full transition-all duration-200" :style="'width: ' + powerProgress + '%'"></div>
                     </div>
                 </div>

                 <!-- Log de Terminal -->
                 <template x-for="(log, idx) in consoleLog" :key="idx">
                     <div x-text="log" :class="log.includes('[OK]') ? 'text-emerald-400' : (log.includes('[ALERTA]') ? 'text-amber-400' : 'text-slate-400')"></div>
                 </template>
                 <div x-show="vpsPowerState === 'off' && !isPowerLoading" class="text-red-500 font-bold py-4 text-center font-sans text-[11px]">
                     [SISTEMA] Sin conexión: Servidor Apagado. Presiona 'Encender' para arrancar.
                 </div>
             </div>

             <!-- Botones de Acción / Footer -->
             <div class="p-5 border-t border-[#F4F7FE] bg-white flex items-center justify-between shrink-0 font-sans">
                 <div class="flex items-center gap-2">
                     <button @click="runSimulatedAction('on')" 
                             :disabled="vpsPowerState === 'on' || isPowerLoading" 
                             class="bg-emerald-500 hover:bg-emerald-600 active:scale-95 disabled:opacity-50 text-white text-[10px] font-extrabold px-3.5 py-2 rounded-xl transition-all cursor-pointer border-0">
                         Encender
                     </button>
                     <button @click="runSimulatedAction('off')" 
                             :disabled="vpsPowerState === 'off' || isPowerLoading" 
                             class="bg-red-500 hover:bg-red-600 active:scale-95 disabled:opacity-50 text-white text-[10px] font-extrabold px-3.5 py-2 rounded-xl transition-all cursor-pointer border-0">
                         Apagar
                     </button>
                     <button @click="runSimulatedAction('restart')" 
                             :disabled="vpsPowerState === 'off' || isPowerLoading" 
                             class="bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 disabled:opacity-50 text-white text-[10px] font-extrabold px-3.5 py-2 rounded-xl transition-all cursor-pointer border-0">
                         Reiniciar VPS
                     </button>
                 </div>
                 
                 <button @click="showConsoleModal = false" :disabled="isPowerLoading" class="bg-[#F4F7FE] hover:bg-[#E8EDF6] text-[#1B254B] text-[10px] font-extrabold px-4 py-2.5 rounded-xl transition-all cursor-pointer border-0 disabled:opacity-50">
                     Cerrar Consola
                 </button>
             </div>
         </div>
    </div>
</div>
@endsection

