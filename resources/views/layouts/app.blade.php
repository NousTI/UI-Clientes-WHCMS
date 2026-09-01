<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      class="h-full scroll-smooth" 
      x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true',
          sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true',
          sidebarOpen: false 
      }"
      x-bind:class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $title ?? 'Nous - Área de Cliente')</title>

    <!-- Fonts: Plus Jakarta Sans for premium typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    <script>
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos de soporte para evitar parpadeos de AlpineJS -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>
<body class="h-full bg-[#F4F7FE] dark:bg-[#0B0F19] font-['Plus_Jakarta_Sans',sans-serif] text-[#1B254B] dark:text-[#F4F7FE] antialiased transition-colors duration-200">

    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Container (Responsive wrapper) -->
        @include('components.sidebar')

        <!-- Mobile Sidebar Overlay -->
        <div 
            x-show="sidebarOpen" 
            @click="sidebarOpen = false" 
            x-transition:enter="transition-opacity ease-linear duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-40 bg-slate-900/20 backdrop-blur-xs lg:hidden"
            style="display: none;"
            x-cloak
        ></div>

        <!-- Main Content Area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            
            <!-- Navbar -->
            @include('components.navbar')

            <!-- Content -->
            <main class="flex-1 overflow-y-auto px-4 py-6 sm:px-6 lg:px-8">
                <!-- Banner de Alerta de Pago Pendiente -->
                @if(!empty($overdueInvoice))
                    @php
                        $daysOverdue = now()->diffInDays($overdueInvoice->due_at);
                        $overdueText = "Factura {$overdueInvoice->invoice_number} vencida — regulariza tu pago para evitar suspensión del servicio.";
                    @endphp
                    <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="mb-6 bg-gradient-to-r from-[#A31D1D] to-[#801616] rounded-[20px] p-4 text-white relative overflow-hidden shadow-[0px_18px_40px_rgba(163,29,29,0.12)] border border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-4 select-none group/alert font-sans">
                        <!-- Figma-style overlay glow -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-y-12 transition-transform duration-750 group-hover/alert:translate-x-full"></div>
                        
                        <div class="relative z-10 flex items-center gap-3">
                            <!-- Icono Alerta / Exclamación -->
                            <div class="h-8 w-8 rounded-lg bg-white/10 text-white flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                                <span class="text-xs font-bold leading-tight text-white">{{ $overdueText }}</span>
                                @if(!empty($expiringDomain))
                                    <span class="text-xs font-medium leading-tight text-[#FFE680]">Dominio {{ $expiringDomain->domain_name }} vence el {{ \Carbon\Carbon::parse($expiringDomain->expires_at)->translatedFormat('d \d\e M') }}.</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="relative z-10 flex items-center gap-3 shrink-0 self-end sm:self-auto">
                            <!-- Botón Pay Now -->
                            <a href="{{ route('invoices') }}" class="bg-[#8AEF97] hover:bg-[#7AD887] active:scale-95 text-[#1B254B] text-[10px] font-extrabold py-2.5 px-4 rounded-xl transition-all shadow-sm shrink-0 flex items-center justify-center">
                                Pagar ahora
                            </a>
                            <!-- Botón Cerrar -->
                            <button @click="show = false" class="text-white/60 hover:text-white transition-colors cursor-pointer p-1 rounded-lg hover:bg-white/10 shrink-0" title="Cerrar aviso">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @hasSection('content')
                    @yield('content')
                @else
                    {{ $slot ?? '' }}
                @endif
            </main>

            <!-- Footer -->
            @include('components.footer')

        </div>
    </div>

    @livewireScripts
</body>
</html>

