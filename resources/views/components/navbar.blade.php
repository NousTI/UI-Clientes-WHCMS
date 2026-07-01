<nav class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 px-4 sm:px-6 lg:px-8 shrink-0">
    <!-- Izquierda: Título de la Página (Estilo Venus) -->
    <div class="flex flex-col">
        <h1 class="text-3xl font-extrabold text-[#1B254B] tracking-tight mt-1 leading-tight">
            Bienvenido, {{ Auth::user()->name }}!
        </h1>
    </div>

    <!-- Derecha: Panel de Control Flotante (Estilo Venus) -->
    <div class="flex items-center self-end md:self-center gap-3 bg-white/70 backdrop-blur-md rounded-full shadow-lg border border-white/20 p-2 shrink-0">
        <!-- Buscador integrado -->
        <div class="relative text-[#A3AED0] focus-within:text-[#1B254B]">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="search" placeholder="Buscar..." class="block w-40 sm:w-48 rounded-full border border-none bg-[#F4F7FE] py-2 pl-10 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:bg-white focus:ring-1 focus:ring-[#4318FF] focus:outline-hidden transition-all duration-150">
        </div>

        <!-- Botón Hamburguesa Móvil (Visible solo en responsive) -->
        <button @click="sidebarOpen = !sidebarOpen" class="inline-flex h-9 w-9 items-center justify-center rounded-full text-[#A3AED0] hover:bg-[#F4F7FE] hover:text-[#1B254B] transition-all lg:hidden cursor-pointer">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Notificaciones (Estilo Venus Dropdown) -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.outside="open = false" class="relative rounded-full p-2 text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50 transition-colors cursor-pointer">
                <span class="sr-only">Notificaciones</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
            </button>
            <div 
                x-show="open" 
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-3 w-80 origin-top-right rounded-2xl bg-white p-4 shadow-xl border border-[#F4F7FE] focus:outline-hidden z-50"
                style="display: none;"
            >
                <div class="flex items-center justify-between border-b border-[#F4F7FE] pb-2.5 mb-3">
                    <span class="text-xs font-bold text-[#1B254B]">Notificaciones</span>
                    <span class="text-[10px] font-bold text-[#4318FF] uppercase tracking-wider cursor-pointer hover:underline">Marcar leídas</span>
                </div>
                <div class="space-y-3">
                    <!-- Notificación 1 -->
                    <div class="flex items-start gap-3 p-2 rounded-xl hover:bg-[#F4F7FE]/30 transition-colors cursor-pointer">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/10 flex items-center justify-center text-xs shrink-0">
                            📦
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-[#1B254B]">Nuevo pedido recibido</span>
                            <span class="text-[10px] text-[#A3AED0] mt-0.5">Hace 5 minutos</span>
                        </div>
                    </div>
                    <!-- Notificación 2 -->
                    <div class="flex items-start gap-3 p-2 rounded-xl hover:bg-[#F4F7FE]/30 transition-colors cursor-pointer">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-xs shrink-0">
                            💵
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-[#1B254B]">Pago de factura #1043 verificado</span>
                            <span class="text-[10px] text-[#A3AED0] mt-0.5">Hace 1 hora</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón Información (Estilo Venus) -->
        <button class="rounded-full p-2 text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50 transition-colors cursor-pointer" title="Información">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

        <!-- Botón Dark/Light Mode (Estilo Venus) -->
        <button 
            x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
            x-init="document.documentElement.classList.toggle('dark', darkMode)"
            @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode ? 'true' : 'false'); document.documentElement.classList.toggle('dark', darkMode)"
            class="rounded-full p-2 text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50 transition-colors cursor-pointer" 
            title="Cambiar Tema"
        >
            <!-- Icono Sol (visible en modo oscuro) -->
            <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M14.5 12a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
            </svg>
            <!-- Icono Luna (visible en modo claro) -->
            <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>

        <!-- Divisor vertical -->
        <span class="h-6 w-px bg-slate-200" aria-hidden="true"></span>

        <!-- Dropdown Usuario -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.outside="open = false" class="h-9 w-9 rounded-full bg-[#4318FF]/10 hover:bg-[#4318FF]/20 text-[#4318FF] font-black flex items-center justify-center text-xs shadow-xs cursor-pointer border border-[#4318FF]/10 transition-colors">
                {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'UD' }}
            </button>
            <div 
                x-show="open" 
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-3 w-56 origin-top-right rounded-2xl bg-white p-2 shadow-xl border border-[#F4F7FE] focus:outline-hidden z-50"
                style="display: none;"
            >
                <div class="px-4 py-2.5 border-b border-[#F4F7FE] mb-1">
                    <p class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider">Conectado como</p>
                    <p class="text-sm font-bold text-[#1B254B] truncate mt-0.5">{{ auth()->check() ? auth()->user()->name : 'Usuario Demo' }}</p>
                </div>
                <a href="#" class="block px-4 py-2 text-xs font-bold text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/30 rounded-xl transition-colors">Mi Perfil</a>
                <a href="#" class="block px-4 py-2 text-xs font-bold text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/30 rounded-xl transition-colors">Ajustes</a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-2 text-xs font-bold text-red-500 hover:bg-red-50 rounded-xl transition-colors cursor-pointer">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>