<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Nous') }} — Nous Technologies</title>

    {{-- Fuente premium --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }

        /* Orb animations */
        @keyframes float-slow  { 0%, 100% { transform: translateY(0px)  } 50% { transform: translateY(-20px) } }
        @keyframes float-med   { 0%, 100% { transform: translateY(0px)  } 50% { transform: translateY(-14px) } }
        @keyframes float-fast  { 0%, 100% { transform: translateY(0px)  } 50% { transform: translateY(-10px) } }
        .orb-slow { animation: float-slow 7s ease-in-out infinite; }
        .orb-med  { animation: float-med  5s ease-in-out infinite; }
        .orb-fast { animation: float-fast 4s ease-in-out infinite; }

        /* Shimmer */
        @keyframes shimmer { 0% { background-position: -200% center; } 100% { background-position: 200% center; } }
        .shimmer-text {
            background: linear-gradient(90deg, #ffffff 0%, #c4b5fd 40%, #ffffff 60%, #a78bfa 100%);
            background-size: 200%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen font-['Plus_Jakarta_Sans',sans-serif] antialiased bg-[#F4F7FE] flex">

{{-- ─── Left Decorative Panel ──────────────────────────────────────── --}}
<div class="hidden lg:flex lg:w-[52%] xl:w-[55%] relative flex-col overflow-hidden bg-gradient-to-br from-[#1B254B] via-[#2D3A7C] to-[#4318FF]">

    {{-- Background orbs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="orb-slow absolute -top-24 -left-24 h-96 w-96 rounded-full bg-[#4318FF]/30 blur-3xl"></div>
        <div class="orb-med  absolute top-1/3 right-0 h-72 w-72 rounded-full bg-[#868CFF]/20 blur-3xl"></div>
        <div class="orb-fast absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-[#5C5CFF]/25 blur-3xl"></div>
        {{-- Grid pattern --}}
        <div class="absolute inset-0 opacity-[0.04]"
             style="background-image: linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px); background-size: 40px 40px;">
        </div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 flex flex-col h-full px-12 py-12">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 select-none">
            <div class="h-10 w-10 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center border border-white/20">
                <span class="text-white font-black text-base leading-none">< /></span>
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-white font-black tracking-widest text-base">NOUS</span>
                <span class="text-white/50 text-[8px] font-bold tracking-widest mt-0.5">TECHNOLOGIES</span>
            </div>
        </a>

        {{-- Hero Text --}}
        <div class="flex-1 flex flex-col justify-center mt-6">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/15 rounded-full px-4 py-1.5 text-[10px] font-bold text-white/80 w-fit mb-6 select-none">
                <span class="h-1.5 w-1.5 rounded-full bg-[#8AEF97] animate-pulse"></span>
                Infraestructura Cloud a nivel empresarial
            </div>

            <h1 class="text-4xl xl:text-5xl font-black leading-tight text-white mb-4">
                Potencia tu<br>
                <span class="shimmer-text">presencia digital</span><br>
                con confianza
            </h1>

            <p class="text-base font-semibold text-white/60 leading-relaxed max-w-sm mb-10">
                Servidores, hosting dedicado, dominios y almacenamiento cloud — todo gestionado desde un solo panel.
            </p>

            {{-- Feature Pills --}}
            <div class="flex flex-wrap gap-2.5">
                
            </div>
        </div>

        {{-- Comentarios --}}
        <div class="relative z-10 mt-auto">
            <div class="bg-white/8 backdrop-blur-sm border border-white/12 rounded-2xl p-5 select-none">
                <div class="flex gap-1 mb-3">
                    @for ($i = 0; $i < 5; $i++)
                    
                        <svg class="h-3.5 w-3.5 text-amber-400 fill-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-[11px] font-semibold text-white/75 leading-relaxed italic mb-3">"Nous nos permitió escalar de 0 a 50k usuarios sin tocar el servidor. La mejor decisión que tomamos para nuestra startup."</p>
                <div class="flex items-center gap-2.5">
                    <div class="h-7 w-7 rounded-full bg-gradient-to-br from-[#868CFF] to-[#4318FF] flex items-center justify-center text-white text-[9px] font-black">AC</div>
                    <div>
                        <span class="text-[10px] font-extrabold text-white block">Ana Castillo</span>
                        <span class="text-[9px] font-semibold text-white/50">CTO · TechStart MX</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ─── Right Form Panel ────────────────────────────────────────────── --}}
<div class="flex-1 flex items-center justify-center p-6 sm:p-10 lg:p-12 bg-[#F4F7FE]">
    <div class="w-full max-w-md">

        {{-- Mobile logo --}}
        <div class="flex lg:hidden justify-center mb-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3 select-none">
                <div class="h-10 w-10 rounded-xl bg-[#4318FF] flex items-center justify-center shadow-md shadow-[#4318FF]/30">
                    <span class="text-white font-black text-base">/</span>
                </div>
                <div class="flex flex-col leading-none">
                    <span class="text-[#4318FF] font-black tracking-widest text-base">NOUS</span>
                    <span class="text-[#A3AED0] text-[8px] font-bold tracking-widest mt-0.5">TECHNOLOGIES</span>
                </div>
            </a>
        </div>

        {{-- Slot: el formulario de login/registro va aquí --}}
        {{ $slot }}

    </div>
</div>

@persist('toast')
    <flux:toast.group>
        <flux:toast />
    </flux:toast.group>
@endpersist

@fluxScripts
</body>
</html>
