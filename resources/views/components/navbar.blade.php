<nav class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 px-4 sm:px-6 lg:px-8 shrink-0">
    <!-- Izquierda: Breadcrumbs y Título de la Página -->
    <div class="flex flex-col">
        <h1 class="text-3xl font-extrabold text-[#1B254B] tracking-tight mt-1 leading-tight">
            Dashboard Principal
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

        <!-- Notificaciones -->
        <button class="relative rounded-full p-2 text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50 transition-colors cursor-pointer">
            <span class="sr-only">Notificaciones</span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
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
