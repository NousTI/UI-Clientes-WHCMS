@extends('layouts.app')

@section('title', 'Programa de Afiliados')

@section('content')
<div class="space-y-6">

    {{-- ─── Page Header ────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Programa de Afiliados</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Gana comisiones por cada cliente que refieras a Nous</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 overflow-hidden group cursor-pointer">
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"/></svg>
                <span class="relative z-10">Compartir Enlace</span>
            </button>
        </div>
    </div>

    {{-- ─── Hero Banner ────────────────────────────────────────────── --}}
    <div class="relative bg-gradient-to-br from-[#1B254B] via-[#2D3A7C] to-[#4318FF] rounded-[20px] p-6 lg:p-8 overflow-hidden shadow-[0px_18px_40px_rgba(67,24,255,0.18)] select-none">
        {{-- Orbs decorativos --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-16 -right-16 h-64 w-64 rounded-full bg-[#868CFF]/20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-48 w-48 rounded-full bg-[#4318FF]/30 blur-2xl"></div>
            <div class="absolute inset-0 opacity-[0.04]" style="background-image: linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px); background-size: 32px 32px;"></div>
        </div>
        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-black text-white leading-tight mb-2">¡Gana <span class="text-[#8AEF97]">20%</span> por cada referido!</h2>
                <p class="text-sm font-semibold text-white/70 leading-relaxed max-w-md">Comparte tu enlace único y recibe el 20% de comisión por cada pago que realice tu referido durante los primeros 12 meses.</p>
            </div>
            <div class="flex flex-col gap-3 shrink-0">
                {{-- Stat mini-cards --}}
                <div class="flex gap-3">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl px-4 py-3 text-center min-w-[90px]">
                        <span class="text-xl font-black text-white block leading-none">$47.50</span>
                        <span class="text-[9px] font-bold text-white/60 block mt-0.5">Pendiente</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl px-4 py-3 text-center min-w-[90px]">
                        <span class="text-xl font-black text-[#8AEF97] block leading-none">$210.00</span>
                        <span class="text-[9px] font-bold text-white/60 block mt-0.5">Total ganado</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl px-4 py-3 text-center min-w-[90px]">
                        <span class="text-xl font-black text-white block leading-none">8</span>
                        <span class="text-[9px] font-bold text-white/60 block mt-0.5">Referidos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ─── Stats Row ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">8</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Referidos Totales</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">5 activos · 3 pendientes</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727l-.214-.113a3.181 3.181 0 00-3.572 0L9 8.09a3.181 3.181 0 00-1.5 2.727v2.364c0 1.25.75 2.364 1.5 2.727z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">$210</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Total Ganado</span>
                <span class="text-[9px] font-bold text-emerald-500 block mt-0.5">Acumulado histórico</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-amber-100 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">$47.50</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Pendiente de Cobro</span>
                <span class="text-[9px] font-bold text-amber-500 block mt-0.5">Próximo pago: 1 Ago</span>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex items-center gap-4 transition-all hover:scale-[1.02] duration-200">
            <div class="h-12 w-12 rounded-xl bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/></svg>
            </div>
            <div>
                <span class="text-[26px] font-black text-[#1B254B] leading-none block">20%</span>
                <span class="text-[11px] font-bold text-[#A3AED0] block mt-0.5">Tu Comisión</span>
                <span class="text-[9px] font-bold text-[#4318FF] block mt-0.5">Por 12 meses · sin límite</span>
            </div>
        </div>
    </div>

    {{-- ─── Main Grid ───────────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── Left Column (2/3) ──────────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Enlace de referido --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-sm font-extrabold text-[#1B254B] mb-1 tracking-tight">Tu Enlace de Referido</h3>
                <p class="text-[10px] font-semibold text-[#A3AED0] mb-4">Comparte este enlace y cada vez que alguien se registre y pague, ganarás el 20% de comisión.</p>
                <div class="flex items-center gap-3">
                    <div class="flex-1 flex items-center gap-3 bg-[#F4F7FE] border border-[#E2E8F0] rounded-xl px-4 py-3 min-w-0">
                        <svg class="h-4 w-4 text-[#4318FF] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                        <span class="text-xs font-extrabold text-[#1B254B] truncate">https://nous.tech/ref/USR-{{ auth()->id() ?? '00001' }}</span>
                    </div>
                    <button
                        x-data="{ copied: false }"
                        @click="
                            navigator.clipboard.writeText('https://nous.tech/ref/USR-{{ auth()->id() ?? '00001' }}');
                            copied = true;
                            setTimeout(() => copied = false, 2000)
                        "
                        class="flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-3 rounded-xl transition-all cursor-pointer shadow-[0px_4px_12px_rgba(67,24,255,0.20)] shrink-0"
                    >
                        <svg x-show="!copied" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184"/></svg>
                        <svg x-show="copied" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span x-text="copied ? '¡Copiado!' : 'Copiar'"></span>
                    </button>
                </div>
                {{-- Compartir en redes --}}
                <div class="flex items-center gap-3 mt-4">
                    <span class="text-[10px] font-extrabold text-[#A3AED0]">Compartir:</span>
                    <a href="https://twitter.com/intent/tweet?text=¡Únete%20a%20Nous%20y%20obtén%20descuento%20en%20tu%20primer%20mes!%20https://nous.tech/ref/USR-{{ auth()->id() ?? '00001' }}" target="_blank" class="h-7 w-7 rounded-lg bg-[#1DA1F2]/10 text-[#1DA1F2] hover:bg-[#1DA1F2] hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Twitter/X">
                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.389 6.231H2.76l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://wa.me/?text=¡Únete%20a%20Nous%20Technologies%20y%20obtén%20descuento!%20https://nous.tech/ref/USR-{{ auth()->id() ?? '00001' }}" target="_blank" class="h-7 w-7 rounded-lg bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500 hover:text-white flex items-center justify-center transition-all cursor-pointer" title="WhatsApp">
                        <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    <a href="mailto:?subject=Únete%20a%20Nous%20Technologies&body=¡Hola!%20Te%20invito%20a%20probar%20Nous%20Technologies.%20Usa%20mi%20enlace:%20https://nous.tech/ref/USR-{{ auth()->id() ?? '00001' }}" class="h-7 w-7 rounded-lg bg-[#4318FF]/10 text-[#4318FF] hover:bg-[#4318FF] hover:text-white flex items-center justify-center transition-all cursor-pointer" title="Email">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                    </a>
                </div>
            </div>

            {{-- Tabla de referidos --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Mis Referidos</h3>
                        <span class="text-[10px] font-bold text-[#A3AED0]">8 personas han usado tu enlace</span>
                    </div>
                    <div class="flex gap-1.5">
                        <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-500 text-[8px] font-extrabold uppercase px-2 py-0.5 rounded-full">5 activos</span>
                        <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-500 text-[8px] font-extrabold uppercase px-2 py-0.5 rounded-full">3 pendientes</span>
                    </div>
                </div>

                {{-- Column headers --}}
                <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 px-3 pb-2 border-b border-[#F4F7FE]">
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0]">Cliente</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-center">Estado</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-right">Comisión</span>
                    <span class="text-[9px] font-extrabold uppercase tracking-wider text-[#A3AED0] text-right">Total</span>
                </div>

                <div class="divide-y divide-[#F4F7FE]">

                    {{-- Referido 1 --}}
                    <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-3.5 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors -mx-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#4318FF] to-[#868CFF] flex items-center justify-center text-white text-[9px] font-black shrink-0">MC</div>
                            <div class="min-w-0">
                                <span class="text-xs font-extrabold text-[#1B254B] block">María Castro</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">Registrado: 15 Jun 2026</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500 whitespace-nowrap">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO
                        </span>
                        <span class="text-xs font-extrabold text-emerald-500 text-right">20%</span>
                        <span class="text-xs font-black text-[#1B254B] text-right">$47.60</span>
                    </div>

                    {{-- Referido 2 --}}
                    <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-3.5 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors -mx-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white text-[9px] font-black shrink-0">JR</div>
                            <div class="min-w-0">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Jorge Ramírez</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">Registrado: 02 Jun 2026</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500 whitespace-nowrap">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO
                        </span>
                        <span class="text-xs font-extrabold text-emerald-500 text-right">20%</span>
                        <span class="text-xs font-black text-[#1B254B] text-right">$32.40</span>
                    </div>

                    {{-- Referido 3 --}}
                    <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-3.5 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors -mx-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white text-[9px] font-black shrink-0">LG</div>
                            <div class="min-w-0">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Luisa García</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">Registrado: 20 May 2026</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[8px] font-extrabold uppercase bg-amber-50 text-amber-500 whitespace-nowrap">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>PENDIENTE
                        </span>
                        <span class="text-xs font-extrabold text-amber-500 text-right">20%</span>
                        <span class="text-xs font-black text-[#A3AED0] text-right">$0.00</span>
                    </div>

                    {{-- Referido 4 --}}
                    <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-3.5 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors -mx-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#7A5CFF] to-[#4318FF] flex items-center justify-center text-white text-[9px] font-black shrink-0">AP</div>
                            <div class="min-w-0">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Andrés Pérez</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">Registrado: 10 May 2026</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500 whitespace-nowrap">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO
                        </span>
                        <span class="text-xs font-extrabold text-emerald-500 text-right">20%</span>
                        <span class="text-xs font-black text-[#1B254B] text-right">$58.20</span>
                    </div>

                    {{-- Referido 5 --}}
                    <div class="grid grid-cols-[1fr_auto_auto_auto] gap-3 items-center py-3.5 px-3 hover:bg-[#F4F7FE]/30 rounded-xl transition-colors -mx-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-pink-400 to-rose-500 flex items-center justify-center text-white text-[9px] font-black shrink-0">SL</div>
                            <div class="min-w-0">
                                <span class="text-xs font-extrabold text-[#1B254B] block">Sofía López</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">Registrado: 02 Abr 2026</span>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-lg text-[8px] font-extrabold uppercase bg-emerald-50 text-emerald-500 whitespace-nowrap">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>ACTIVO
                        </span>
                        <span class="text-xs font-extrabold text-emerald-500 text-right">20%</span>
                        <span class="text-xs font-black text-[#1B254B] text-right">$43.80</span>
                    </div>
                </div>

                {{-- Ver más --}}
                <div class="mt-4 pt-4 border-t border-[#F4F7FE] flex items-center justify-between">
                    <span class="text-[10px] font-semibold text-[#A3AED0]">Mostrando 5 de 8 referidos</span>
                    <button class="text-[10px] font-extrabold text-[#4318FF] hover:text-[#3311CC] cursor-pointer transition-colors">Ver todos →</button>
                </div>
            </div>

            {{-- Historial de pagos --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-sm font-extrabold text-[#1B254B] mb-5 tracking-tight">Historial de Retiros</h3>
                <div class="space-y-2">

                    <div class="flex items-center justify-between gap-3 p-3 bg-[#F4F7FE] rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-extrabold text-[#1B254B] block">Retiro PayPal</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">01 Jul 2026 · pay***@email.com</span>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-sm font-black text-emerald-500 block">+$80.00</span>
                            <span class="text-[9px] font-extrabold uppercase text-emerald-500 bg-emerald-50 px-1.5 py-0.5 rounded">COMPLETADO</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-3 p-3 bg-[#F4F7FE] rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-extrabold text-[#1B254B] block">Retiro PayPal</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">01 Jun 2026 · pay***@email.com</span>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-sm font-black text-emerald-500 block">+$50.00</span>
                            <span class="text-[9px] font-extrabold uppercase text-emerald-500 bg-emerald-50 px-1.5 py-0.5 rounded">COMPLETADO</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-3 p-3 bg-[#F4F7FE] rounded-xl">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center shrink-0">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                            </div>
                            <div>
                                <span class="text-xs font-extrabold text-[#1B254B] block">Crédito en cuenta</span>
                                <span class="text-[10px] font-semibold text-[#A3AED0]">01 May 2026 · Crédito Nous</span>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-sm font-black text-emerald-500 block">+$80.00</span>
                            <span class="text-[9px] font-extrabold uppercase text-emerald-500 bg-emerald-50 px-1.5 py-0.5 rounded">COMPLETADO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── Right Sidebar (1/3) ────────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Retiro de comisiones --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Retirar Comisiones</h3>

                <div class="bg-[#F4F7FE] rounded-xl p-4 mb-4 text-center">
                    <span class="text-[10px] font-bold text-[#A3AED0] block">Disponible para retirar</span>
                    <span class="text-3xl font-black text-[#1B254B] block mt-1">$47.50</span>
                    <span class="text-[9px] font-semibold text-[#A3AED0]">Mínimo de retiro: $25.00</span>
                </div>

                <div class="space-y-2 mb-4">
                    <label class="block text-[10px] font-extrabold text-[#1B254B] mb-1.5">Método de retiro</label>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#4318FF] bg-[#4318FF]/5 cursor-pointer">
                            <input type="radio" name="withdraw" value="paypal" checked class="text-[#4318FF] focus:ring-[#4318FF]/30">
                            <div class="flex items-center gap-2 flex-1">
                                <div class="h-6 w-10 rounded bg-[#003087] text-white flex items-center justify-center text-[7px] font-black shrink-0">PayPal</div>
                                <span class="text-xs font-bold text-[#1B254B]">pay***@email.com</span>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-3 rounded-xl border border-[#E2E8F0] hover:border-[#4318FF]/30 cursor-pointer">
                            <input type="radio" name="withdraw" value="credit" class="text-[#4318FF] focus:ring-[#4318FF]/30">
                            <div class="flex items-center gap-2 flex-1">
                                <div class="h-6 w-10 rounded bg-[#4318FF]/10 text-[#4318FF] flex items-center justify-center shrink-0">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0l.214-.113A3.181 3.181 0 0015 13.182V10.82a3.181 3.181 0 00-1.5-2.727"/></svg>
                                </div>
                                <span class="text-xs font-bold text-[#1B254B]">Crédito en cuenta</span>
                            </div>
                        </label>
                    </div>
                </div>
                <div>
                    
                </div>
                <button class="w-full flex items-center justify-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold py-3 px-4 rounded-xl transition-all shadow-[0px_6px_20px_rgba(67,24,255,0.20)] cursor-pointer">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                    Solicitar Retiro — $47.50
                </button>
                <p class="text-[9px] font-semibold text-[#A3AED0] text-center mt-2">Los retiros se procesan en 1-3 días hábiles</p>
            </div>

            {{-- Cómo funciona --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">¿Cómo funciona?</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="h-7 w-7 rounded-full bg-[#4318FF] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">1</div>
                        <div>
                            <span class="text-xs font-extrabold text-[#1B254B] block mb-0.5">Comparte tu enlace</span>
                            <span class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Envía tu enlace único a amigos, colegas o en redes sociales.</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-7 w-7 rounded-full bg-[#4318FF] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">2</div>
                        <div>
                            <span class="text-xs font-extrabold text-[#1B254B] block mb-0.5">Tu referido se registra</span>
                            <span class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Cuando alguien usa tu enlace y contrata un servicio, queda vinculado a ti.</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-7 w-7 rounded-full bg-[#4318FF] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">3</div>
                        <div>
                            <span class="text-xs font-extrabold text-[#1B254B] block mb-0.5">Gana el 20% de comisión</span>
                            <span class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Cada vez que tu referido paga, recibes el 20% de ese monto durante 12 meses.</span>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-7 w-7 rounded-full bg-emerald-500 text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.214.113a3.181 3.181 0 003.572 0"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-extrabold text-[#1B254B] block mb-0.5">Retira tus ganancias</span>
                            <span class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Retira a PayPal o aplica como crédito en tu próxima factura. Mínimo $25.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
