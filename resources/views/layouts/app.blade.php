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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos de soporte para evitar parpadeos de AlpineJS -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
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

</body>
</html>

