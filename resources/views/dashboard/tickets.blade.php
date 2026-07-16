@extends('layouts.app')

@section('title', 'Tickets de Soporte')

@section('content')
<div class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Tickets de Soporte</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Gestiona tus solicitudes de soporte técnico</p>
        </div>
        <div class="flex items-center gap-3">
            <button
                x-data
                @click="$dispatch('open-new-ticket')"
                class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 overflow-hidden group cursor-pointer"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                <span class="relative z-10">Abrir Ticket</span>
            </button>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    @php
        $openCount = $tickets->where('status', 'open')->count();
        $inProgressCount = $tickets->where('status', 'in_progress')->count();
        $resolvedCount = $tickets->whereIn('status', ['resolved', 'closed'])->count();
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Abiertos --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $openCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Tickets Abiertos</span>
                <span class="text-[9px] font-bold text-[#4318FF] block mt-0.5">Requieren atención</span>
            </div>
        </div>
        {{-- En Progreso --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $inProgressCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">En Progreso</span>
                <span class="text-[9px] font-bold text-amber-500 block mt-0.5">Equipo trabajando</span>
            </div>
        </div>
        {{-- Resueltos --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">{{ $resolvedCount }}</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Resueltos</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">Historial completo</span>
            </div>
        </div>
        {{-- Tiempo de Respuesta --}}
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">2h</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Tiempo Promedio</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">Respuesta inicial</span>
            </div>
        </div>
    </div>

    {{-- ─── Main Grid ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── Ticket List (2/3) ──────────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-4">

            {{-- Filters --}}
            <div class="flex flex-wrap items-center gap-2">
                <button class="bg-[#4318FF] text-white px-4 py-1.5 rounded-full text-xs font-bold shadow-[0px_4px_12px_rgba(67,24,255,0.20)] cursor-pointer">Todos</button>
                <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30 px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Abiertos</button>
                <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30 px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">En Progreso</button>
                <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30 px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Resueltos</button>
                <button class="bg-white border border-[#E0E5F2] text-[#A3AED0] hover:text-[#1B254B] hover:border-[#4318FF]/30 px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">Cerrados</button>
                <div class="ml-auto relative">
                    <input type="search" placeholder="Buscar ticket..." class="block rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-1.5 pl-8 pr-3 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all w-40">
                    <svg class="absolute left-2.5 top-2 h-3.5 w-3.5 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>

            @php
                $activeTickets = $tickets->whereIn('status', ['open', 'in_progress']);
                $closedTickets = $tickets->whereIn('status', ['resolved', 'closed']);
            @endphp

            @forelse ($activeTickets as $ticket)
                @php
                    $isUrgent = in_array($ticket->priority, ['high', 'critical']);
                    $priorityLabel = match($ticket->priority) {
                        'critical' => 'CRÍTICO',
                        'high' => 'ALTA',
                        'medium' => 'MEDIA',
                        default => 'BAJA',
                    };
                    $priorityColorClass = match($ticket->priority) {
                        'critical' => 'bg-red-100 text-red-700',
                        'high' => 'bg-red-50 text-red-500',
                        'medium' => 'bg-orange-50 text-orange-500',
                        default => 'bg-[#F4F7FE] text-[#A3AED0]',
                    };
                    
                    $statusLabel = match($ticket->status) {
                        'open' => 'ABIERTO',
                        'in_progress' => 'EN PROGRESO',
                        default => 'CERRADO',
                    };
                    $statusColorClass = match($ticket->status) {
                        'open' => 'bg-[#4318FF]/10 text-[#4318FF]',
                        'in_progress' => 'bg-amber-50 text-amber-500',
                        default => 'bg-slate-100 text-slate-500',
                    };
                    
                    $borderLColor = $ticket->status === 'open' ? 'border-l-[#4318FF]' : 'border-l-amber-400';
                    $hoverShadow = $ticket->status === 'open' ? 'hover:shadow-[0px_18px_40px_rgba(67,24,255,0.08)]' : 'hover:shadow-[0px_18px_40px_rgba(245,158,11,0.08)]';
                    
                    $firstMessage = $ticket->messages->sortBy('created_at')->first();
                    $repliesCount = $ticket->messages->count() - 1;
                    if ($repliesCount < 0) $repliesCount = 0;
                    
                    $lastMessage = $ticket->messages->sortByDesc('created_at')->first();
                    $lastReplierText = 'Sin respuestas';
                    $lastReplierColor = 'text-[#A3AED0]';
                    if ($lastMessage) {
                        if ($lastMessage->is_agent) {
                            $lastReplierText = 'Agente respondió';
                            $lastReplierColor = 'text-emerald-500';
                        } elseif ($repliesCount > 0) {
                            $lastReplierText = 'Tu respuesta';
                            $lastReplierColor = 'text-[#4318FF]';
                        }
                    }
                @endphp
                
                <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border-l-4 {{ $borderLColor }} border border-white/50 {{ $hoverShadow }} transition-all duration-200 font-sans">
                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                        {{-- Left --}}
                        <div class="flex items-start gap-3 min-w-0 flex-1">
                            <div class="h-10 w-10 rounded-xl {{ $isUrgent ? 'bg-red-50 text-red-500' : 'bg-[#4318FF]/8 text-[#4318FF]' }} flex items-center justify-center shrink-0 mt-0.5">
                                @if ($isUrgent)
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                                @else
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"/></svg>
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <span class="text-[10px] font-extrabold text-[#A3AED0]">{{ $ticket->ticket_number }}</span>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[8px] font-extrabold uppercase {{ $statusColorClass }}">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $ticket->status === 'open' ? 'bg-[#4318FF]' : 'bg-amber-500' }} animate-pulse"></span>{{ $statusLabel }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded-md text-[8px] font-extrabold uppercase {{ $priorityColorClass }}">{{ $priorityLabel }}</span>
                                </div>
                                <h3 class="text-sm font-extrabold text-[#1B254B] leading-snug mb-1">{{ $ticket->subject }}</h3>
                                <p class="text-[10px] font-semibold text-[#A3AED0] line-clamp-2 leading-relaxed">{{ $firstMessage?->message }}</p>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-2.5 text-[10px] font-semibold text-[#A3AED0]">
                                    <span class="flex items-center gap-1">
                                        <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $ticket->created_at->diffForHumans() }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                                        {{ $repliesCount }} {{ Str::plural('respuesta', $repliesCount) }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5"/></svg>
                                        {{ $ticket->department }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- Right --}}
                        <div class="flex sm:flex-col items-center sm:items-end justify-between gap-2 shrink-0">
                            <a href="#" class="relative inline-flex items-center gap-1.5 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-[10px] font-extrabold px-3 py-2 rounded-xl transition-all overflow-hidden group cursor-pointer">
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                                <svg class="h-3.5 w-3.5 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                                <span class="relative z-10">Ver Ticket</span>
                            </a>
                            <div class="flex items-center gap-1.5 text-[9px] font-bold {{ $lastReplierColor }}">
                                @if ($lastReplierText !== 'Sin respuestas')
                                    <span class="h-1.5 w-1.5 rounded-full {{ $lastReplierColor === 'text-emerald-500' ? 'bg-emerald-500 animate-pulse' : 'bg-[#4318FF] animate-pulse' }}"></span>
                                @endif
                                {{ $lastReplierText }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center bg-[#F4F7FE]/30 rounded-xl">
                    <span class="text-xs font-bold text-[#A3AED0]">No tienes ningún ticket de soporte activo.</span>
                </div>
            @endforelse

            {{-- ── Closed Tickets Section ───────────────────────────── --}}
            <div class="mt-2">
                <h3 class="text-[10px] font-extrabold text-[#A3AED0] uppercase tracking-wider mb-3">Tickets Cerrados Recientes</h3>
                <div class="space-y-2">
                    @forelse ($closedTickets as $ticket)
                        @php
                            $repliesCount = $ticket->messages->count() - 1;
                            if ($repliesCount < 0) $repliesCount = 0;
                            
                            $statusLabel = $ticket->status === 'resolved' ? 'RESUELTO' : 'CERRADO';
                            $statusBg = $ticket->status === 'resolved' ? 'bg-emerald-50 text-emerald-500' : 'bg-[#F4F7FE] text-[#A3AED0]';
                            $statusIconColor = $ticket->status === 'resolved' ? 'bg-emerald-50 text-emerald-500' : 'bg-[#F4F7FE] text-[#A3AED0]';
                        @endphp
                        <div class="bg-white rounded-[20px] p-4 shadow-[0px_8px_24px_rgba(112,144,176,0.04)] border border-[#F4F7FE] hover:border-[#E0E5F2] transition-all duration-150 flex flex-col sm:flex-row sm:items-center justify-between gap-3 font-sans">
                            <div class="flex items-center gap-3 min-w-0">
                                <div class="h-9 w-9 rounded-xl {{ $statusIconColor }} flex items-center justify-center shrink-0">
                                    @if ($ticket->status === 'resolved')
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    @else
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-1.5 mb-0.5">
                                        <span class="text-[10px] font-extrabold text-[#A3AED0]">{{ $ticket->ticket_number }}</span>
                                        <span class="px-1.5 py-0.5 rounded text-[8px] font-extrabold uppercase {{ $statusBg }}">{{ $statusLabel }}</span>
                                    </div>
                                    <h4 class="text-xs font-extrabold text-[#1B254B] truncate">{{ $ticket->subject }}</h4>
                                    <span class="text-[10px] font-semibold text-[#A3AED0]">{{ $statusLabel === 'RESUELTO' ? 'Resuelto' : 'Cerrado' }} {{ $ticket->updated_at->diffForHumans() }} · {{ $repliesCount }} respuestas</span>
                                </div>
                            </div>
                            <a href="#" class="text-[10px] font-extrabold text-[#4318FF] hover:underline whitespace-nowrap shrink-0">Ver →</a>
                        </div>
                    @empty
                        <div class="p-4 text-center bg-[#F4F7FE]/20 rounded-xl">
                            <span class="text-xs font-bold text-[#A3AED0]">No tienes tickets cerrados o resueltos.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ─── Right Sidebar (1/3) ────────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Open Ticket CTA --}}
            <div class="bg-gradient-to-br from-[#868CFF] via-[#5C5CFF] to-[#4318FF] rounded-[20px] p-6 text-white relative overflow-hidden shadow-[0px_18px_40px_rgba(67,24,255,0.18)] select-none group">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/8 to-white/0 transform skew-y-12 transition-transform duration-700 group-hover:translate-x-full"></div>
                <div class="relative z-10">
                    <div class="h-12 w-12 rounded-xl bg-white/15 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"/></svg>
                    </div>
                    <h4 class="text-sm font-black mb-1">¿Necesitas ayuda?</h4>
                    <p class="text-[11px] text-white/75 font-semibold leading-relaxed mb-4">Nuestro equipo de soporte responde en menos de 2 horas. Abre un ticket y resolveremos tu problema.</p>
                    <button class="w-full bg-white/20 hover:bg-white/30 text-white text-xs font-extrabold py-2.5 px-4 rounded-xl transition-all cursor-pointer">
                        Abrir Nuevo Ticket
                    </button>
                </div>
            </div>

            {{-- SLA / Horario --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Acuerdo de Nivel de Servicio</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-6 w-6 rounded-lg bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-[#1B254B]">Urgente</span>
                        </div>
                        <span class="text-[10px] font-extrabold text-red-500">< 1 hora</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-6 w-6 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center shrink-0">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-[#1B254B]">Alta</span>
                        </div>
                        <span class="text-[10px] font-extrabold text-orange-500">< 4 horas</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-6 w-6 rounded-lg bg-amber-50 text-amber-500 flex items-center justify-center shrink-0">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-[#1B254B]">Media</span>
                        </div>
                        <span class="text-[10px] font-extrabold text-amber-500">< 8 horas</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="h-6 w-6 rounded-lg bg-[#F4F7FE] text-[#A3AED0] flex items-center justify-center shrink-0">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-[#1B254B]">Baja</span>
                        </div>
                        <span class="text-[10px] font-extrabold text-[#A3AED0]">< 24 horas</span>
                    </div>
                    <div class="pt-3 border-t border-[#F4F7FE]">
                        <div class="flex items-center gap-2 text-[10px] font-semibold text-[#A3AED0]">
                            <svg class="h-3.5 w-3.5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Soporte 24/7 · Lun–Dom
                        </div>
                    </div>
                </div>
            </div>

            {{-- Canales Alternativos --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Otros Canales</h3>
                <div class="space-y-2">
                    <a href="#" class="group flex items-center gap-3 p-3 rounded-xl bg-[#F4F7FE] hover:bg-[#E8EDF6] transition-all select-none">
                        <div class="h-8 w-8 rounded-lg bg-emerald-100 text-emerald-500 flex items-center justify-center shrink-0">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs font-extrabold text-[#1B254B] block">Chat en Vivo</span>
                            <span class="text-[9px] font-semibold text-emerald-500">● En línea ahora</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                    <a href="mailto:soporte@nous.tech" class="group flex items-center gap-3 p-3 rounded-xl bg-[#F4F7FE] hover:bg-[#E8EDF6] transition-all select-none">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs font-extrabold text-[#1B254B] block">Email</span>
                            <span class="text-[9px] font-semibold text-[#A3AED0]">soporte@nous.tech</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                    <a href="#" class="group flex items-center gap-3 p-3 rounded-xl bg-[#F4F7FE] hover:bg-[#E8EDF6] transition-all select-none">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="text-xs font-extrabold text-[#1B254B] block">Base de Conocimiento</span>
                            <span class="text-[9px] font-semibold text-[#A3AED0]">Guías y tutoriales</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] group-hover:text-[#1B254B] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
