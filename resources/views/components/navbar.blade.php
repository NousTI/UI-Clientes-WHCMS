<nav class="relative z-20 flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 px-4 sm:px-6 lg:px-8 shrink-0">
    <!-- Izquierda: Título de la Página -->
    <div class="flex flex-col lg:flex-row lg:items-center gap-6">
        <div class="flex flex-col">
            <h1 class="text-3xl font-extrabold text-[#1B254B] tracking-tight mt-1 leading-tight">
                Bienvenido, {{ Auth::user()->name }}!
            </h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">
                Esto es lo que está sucediendo con tu cuenta hoy.
            </p>
        </div>
        
        <!-- Tarjeta de Billetera -->
        <div class="bg-gradient-to-br from-[#7A5CFF] to-[#4318FF] rounded-[20px] p-4 text-white relative overflow-hidden flex flex-col justify-between w-64 h-24 shadow-[0px_10px_30px_rgba(112,144,176,0.12)] shrink-0 select-none">
            <!-- Brillo diagonal  -->
            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12"></div>
            
            <!-- Contenido de la Billetera -->
            <div class="relative z-10 flex justify-between items-start">
                <div class="flex flex-col">
                    <span class="text-[9px] font-bold text-white/80 uppercase tracking-wider leading-none">Balance de Credito</span>
                    <span class="text-xl font-black text-white mt-1 leading-none">$255.00</span>
                </div>
            </div>
            
            <!-- Gráfico de Ondulación Blanco-->
            <div class="relative z-10 flex justify-end items-end h-6 w-full">
                <svg class="w-24 h-6 stroke-white fill-none stroke-[2.5]" viewBox="0 0 100 30" preserveAspectRatio="none">
                    <path d="M 0,20 Q 12,28 25,12 T 50,15 T 75,5 T 100,10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
        
    </div>

    <!-- Derecha: Panel de Control Flotante-->
    <div class="flex items-center self-end md:self-center gap-3 nous-navbar-pill rounded-full shadow-lg p-2 shrink-0">
        <!-- Buscador integrado -->
        <div class="relative text-[#A3AED0] focus-within:text-[#1B254B]">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <input type="search" placeholder="Buscar..." class="nous-navbar-search block w-40 sm:w-48 rounded-full border-none py-2 pl-10 pr-4 text-xs font-bold focus:ring-1 focus:ring-[#4318FF] focus:outline-hidden transition-all duration-150">
        </div>

        <button @click="sidebarOpen = !sidebarOpen" class="nous-navbar-icon-btn inline-flex h-9 w-9 items-center justify-center lg:hidden cursor-pointer">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>



        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @click.outside="open = false" class="nous-navbar-icon-btn relative cursor-pointer">
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
                x-trasciocion:leave-end="trasnform opacity-0 scale-95"

                class="nous-dropdown absolute right-0 mt-3 w-80 origin-top-right rounded-2xl p-4 border focus:outline-hidden z-50"
                style="display: none;"
            >
                <div class="flex items-center justify-between border-b pb-2.5 mb-3" style="border-color: var(--nous-border)">
                    <span class="text-xs font-bold" style="color: var(--nous-text-primary)">Notificaciones</span>
                    <span class="text-[10px] font-bold text-[#4318FF] uppercase tracking-wider cursor-pointer hover:underline">Marcar leídas</span>
                </div>
                <div class="space-y-3">
                    <!-- Notificación 1 -->
                    <div class="nous-dropdown-item flex items-start gap-3 p-2 rounded-xl cursor-pointer">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/10 flex items-center justify-center text-xs shrink-0"></div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold" style="color: var(--nous-text-primary)">Nuevo pedido recibido</span>
                            <span class="text-[10px] mt-0.5" style="color: var(--nous-text-secondary)">Hace 5 minutos</span>
                        </div>
                    </div>
                    <!-- Notificación 2 -->
                    <div class="nous-dropdown-item flex items-start gap-3 p-2 rounded-xl cursor-pointer">
                        <div class="h-8 w-8 rounded-lg bg-emerald-500/10 flex items-center justify-center text-xs shrink-0"></div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold" style="color: var(--nous-text-primary)">Pago de factura #1043 verificado</span>
                            <span class="text-[10px] mt-0.5" style="color: var(--nous-text-secondary)">Hace 1 hora</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón Información -->
        <button class="nous-navbar-icon-btn cursor-pointer" title="Información">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

        <!-- Botón Dark/Light Mode -->
        <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode ? 'true' : 'false')" class="nous-navbar-icon-btn cursor-pointer" title="Cambiar Tema">
            <!-- Icono Sol -->
            <svg x-show="darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M14.5 12a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
            </svg>
            <!-- Icono Luna -->
            <svg x-show="!darkMode" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>

    </div>
</nav>