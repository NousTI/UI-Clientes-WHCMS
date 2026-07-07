<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nous Technologies — Infraestructura Cloud de nivel empresarial. VPS, servidores dedicados, dominios y almacenamiento cloud gestionados desde un solo panel.">

    <title>Nous Technologies — Cloud Infrastructure</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        @keyframes float-slow  { 0%, 100% { transform: translateY(0px)  } 50% { transform: translateY(-24px) } }
        @keyframes float-med   { 0%, 100% { transform: translateY(0px)  } 50% { transform: translateY(-14px) } }
        .orb-slow { animation: float-slow 8s ease-in-out infinite; }
        .orb-med  { animation: float-med  5s ease-in-out infinite; }

        @keyframes shimmer { 0% { background-position: -200% center; } 100% { background-position: 200% center; } }
        .shimmer-text {
            background: linear-gradient(90deg, #4318FF 0%, #868CFF 35%, #4318FF 60%, #A78BFA 100%);
            background-size: 200%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 4s ease-in-out infinite;
        }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in-up { animation: fadeInUp 0.6s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
        .delay-400 { animation-delay: 0.4s; opacity: 0; }
        .delay-500 { animation-delay: 0.5s; opacity: 0; }

        /* Ticket card hover tilt */
        .card-hover { transition: transform 0.25s ease, box-shadow 0.25s ease; }
        .card-hover:hover { transform: translateY(-4px) scale(1.01); box-shadow: 0 24px 48px rgba(67,24,255,0.10); }
    </style>
</head>
<body class="bg-[#F4F7FE] text-[#1B254B] antialiased">

{{-- ─── Navbar ──────────────────────────────────────────────────────── --}}
<header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b border-white/60 shadow-[0px_4px_8px_rgba(112,144,176,0.06)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex h-16 items-center justify-between">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 select-none">
            <div class="h-9 w-9 rounded-xl bg-[#4318FF] flex items-center justify-center shadow-md shadow-[#4318FF]/25">
                <span class="text-white font-black text-sm">< /></span>
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-[#4318FF] font-black tracking-widest text-sm">NOUS</span>
                <span class="text-[#A3AED0] text-[7px] font-bold tracking-widest">TECHNOLOGIES</span>
            </div>
            <div>
                
            </div>
        </a>

        {{-- CTA --}}
        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="text-xs font-extrabold text-[#1B254B] hover:text-[#4318FF] transition-colors px-3 py-1.5">
                    Mi Panel
                </a>
            @else
                <a href="{{ route('login') }}" class="text-xs font-extrabold text-[#A3AED0] hover:text-[#1B254B] transition-colors px-3 py-1.5">
                    Iniciar Sesión
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="relative inline-flex items-center gap-1.5 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-4 py-2 rounded-xl shadow-[0px_4px_16px_rgba(67,24,255,0.22)] transition-all overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                        <span class="relative z-10">Comenzar Gratis</span>
                    </a>
                @endif
            @endauth
        </div>
    </div>
</header>

{{-- ─── Hero ────────────────────────────────────────────────────────── --}}
<section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
    {{-- Background gradient + orbs --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="orb-slow absolute -top-32 -right-32 h-[600px] w-[600px] rounded-full bg-[#4318FF]/8 blur-3xl"></div>
        <div class="orb-med  absolute bottom-0 -left-20 h-96 w-96 rounded-full bg-[#868CFF]/10 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- Badge --}}
        <div class="fade-in-up delay-100 inline-flex items-center gap-2 bg-white border border-[#E2E8F0] rounded-full px-5 py-2 text-[10px] font-extrabold text-[#4318FF] shadow-sm mb-8">
            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Infraestructura Cloud con 99.99% de disponibilidad
        </div>

        {{-- Headline --}}
        <h1 class="fade-in-up delay-200 text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-tight text-[#1B254B] max-w-4xl mx-auto mb-6">
            <br>
            <span class="shimmer-text">IMPULSAMOS</span><br>
            la innovacion en un universo digital. <br>
        </h1>
        
        <p class="fade-in-up delay-300 text-base sm:text-lg font-semibold text-[#A3AED0] leading-relaxed max-w-2xl mx-auto mb-10">
            Servidores VPS, hosting dedicado, dominios y almacenamiento cloud de alto rendimiento — todo gestionado desde un panel intuitivo y potente.
        </p>

        {{-- CTA Buttons --}}
        <div class="fade-in-up delay-400 flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="relative inline-flex items-center gap-2.5 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-sm font-extrabold px-8 py-4 rounded-xl shadow-[0px_12px_32px_rgba(67,24,255,0.28)] transition-all overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                    <span class="relative z-10">Empieza Gratis Hoy</span>
                    <svg class="relative z-10 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            @endif
        </div>

        {{-- Trust Badges --}}
        <div class="fade-in-up delay-500 flex flex-wrap items-center justify-center gap-6 text-[10px] font-bold text-[#A3AED0]">
            <div class="flex items-center gap-1.5">
                <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Sin contrato de permanencia
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Configuración en 60 segundos
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Soporte técnico 24/7
            </div>
            <div class="flex items-center gap-1.5">
                <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Cancelación inmediata
            </div>
        </div>
    </div>
</section>

{{-- ─── Stats Strip ─────────────────────────────────────────────────── --}}
<section class="py-12 bg-white border-y border-[#F4F7FE]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-3xl font-black text-[#4318FF] mb-1">12K+</div>
                <div class="text-xs font-bold text-[#A3AED0]">Clientes activos</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-[#4318FF] mb-1">99.99%</div>
                <div class="text-xs font-bold text-[#A3AED0]">Uptime garantizado</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-[#4318FF] mb-1">15</div>
                <div class="text-xs font-bold text-[#A3AED0]">Regiones globales</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-[#4318FF] mb-1">&lt;2h</div>
                <div class="text-xs font-bold text-[#A3AED0]">Respuesta de soporte</div>
            </div>
        </div>
    </div>
</section>

{{-- ─── CTA Final ───────────────────────────────────────────────────── --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-[#1B254B] via-[#2D3A7C] to-[#4318FF] rounded-[28px] p-12 relative overflow-hidden shadow-[0px_32px_80px_rgba(67,24,255,0.22)]">
            {{-- Orbs --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="orb-slow absolute -top-16 -right-16 h-64 w-64 rounded-full bg-[#868CFF]/25 blur-3xl"></div>
                <div class="orb-med  absolute -bottom-16 -left-16 h-64 w-64 rounded-full bg-[#4318FF]/30 blur-3xl"></div>
                <div class="absolute inset-0 opacity-[0.04]" style="background-image: linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px); background-size: 32px 32px;"></div>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight leading-tight mb-4">
                    ¿Listo para escalar<br>tu infraestructura?
                </h2>
                <p class="text-sm font-semibold text-white/70 max-w-xl mx-auto mb-8 leading-relaxed">
                    Únete a más de 12,000 empresas que ya confían en Nous para su infraestructura crítica. Empieza gratis, sin tarjeta de crédito.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="relative inline-flex items-center gap-2 bg-white hover:bg-gray-50 active:scale-95 text-[#4318FF] text-sm font-extrabold px-8 py-4 rounded-xl shadow-[0px_8px_24px_rgba(0,0,0,0.15)] transition-all overflow-hidden group">
                            <span>Crear cuenta gratis</span>
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    @endif
                    <a href="{{ route('login') }}" class="text-sm font-extrabold text-white/80 hover:text-white transition-colors px-4 py-4">
                        Ya tengo cuenta →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── Footer ──────────────────────────────────────────────────────── --}}
<footer class="bg-white border-t border-[#F4F7FE] py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="h-8 w-8 rounded-lg bg-[#4318FF] flex items-center justify-center">
                    <span class="text-white font-black text-xs">< /></span>
                </div>
                <div>
                    <span class="text-[#4318FF] font-black tracking-widest text-sm">NOUS</span>
                    <span class="text-[#A3AED0] text-[8px] font-bold ml-1">TECHNOLOGIES</span>
                </div>
            </div>
            <p class="text-[10px] font-semibold text-[#A3AED0]">
                © {{ date('Y') }} Nous Technologies. Todos los derechos reservados.
            </p>
            <div class="flex items-center gap-5 text-[10px] font-bold text-[#A3AED0]">
                <a href="#" class="hover:text-[#4318FF] transition-colors">Privacidad</a>
                <a href="#" class="hover:text-[#4318FF] transition-colors">Términos</a>
                <a href="#" class="hover:text-[#4318FF] transition-colors">Estado</a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
