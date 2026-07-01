<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-[#F4F7FE] bg-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shrink-0 shadow-sm"
>
    <!-- Cabecera / Logotipo -->
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-[#F4F7FE] px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <span class="text-lg font-black tracking-wider text-[#1B254B]">
                eCom <span class="text-[#4318FF] font-extrabold">VENUS</span>
            </span>
        </a>
        <!-- Botón cerrar móvil -->
        <button @click="sidebarOpen = false" class="lg:hidden text-[#A3AED0] hover:text-[#1B254B] p-1.5 rounded-lg transition-colors cursor-pointer">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navegación -->
    <div class="flex-1 overflow-y-auto py-6 space-y-8">
        
        <!-- Grupo 1: Gestión -->
        <div class="space-y-2">
            <h3 class="px-6 text-[10px] font-bold tracking-wider text-[#A3AED0] uppercase">Gestión</h3>
            <div class="space-y-1">
                <!-- Dashboard -->
                <div class="relative flex items-center">
                    <a href="{{ route('dashboard') }}" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 {{ request()->routeIs('dashboard') ? 'text-[#1B254B]' : 'text-[#A3AED0] hover:text-[#1B254B]' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 {{ request()->routeIs('dashboard') ? 'text-[#4318FF]' : 'text-[#A3AED0]' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    @if(request()->routeIs('dashboard'))
                        <div class="absolute right-0 top-0 h-full w-[4px] bg-[#4318FF] rounded-l-md"></div>
                    @endif
                </div>

                <!-- Pedidos -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span>Pedidos</span>
                    </a>
                </div>

                <!-- Productos -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span>Productos</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grupo 2: Soporte -->
        <div class="space-y-2">
            <h3 class="px-6 text-[10px] font-bold tracking-wider text-[#A3AED0] uppercase">Soporte</h3>
            <div class="space-y-1">
                <!-- Clientes -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Clientes</span>
                    </a>
                </div>

                <!-- Tickets -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                        <span>Tickets</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grupo 3: Ajustes -->
        <div class="space-y-2">
            <h3 class="px-6 text-[10px] font-bold tracking-wider text-[#A3AED0] uppercase">Ajustes</h3>
            <div class="space-y-1">
                <!-- Facturas -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Facturas</span>
                    </a>
                </div>

                <!-- Configuración -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 transition-transform duration-150 group-hover:scale-105 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Configuración</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Panel de Usuario Inferior (Venus theme) -->
    <div class="shrink-0 border-t border-[#F4F7FE] p-4 bg-white">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-[#4318FF]/10 text-[#4318FF] font-bold flex items-center justify-center text-sm">
                    {{ auth()->check() ? strtoupper(substr(auth()->user()->name, 0, 2)) : 'UD' }}
                </div>
                <div class="flex flex-col truncate max-w-[120px]">
                    <span class="text-xs font-bold text-[#1B254B] truncate leading-none">{{ auth()->check() ? auth()->user()->name : 'Usuario Demo' }}</span>
                    <span class="text-[10px] text-[#A3AED0] truncate mt-1 leading-none">{{ auth()->check() ? auth()->user()->email : 'demo@example.com' }}</span>
                </div>
            </div>
            
            <!-- Botón Logout -->
            <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form">
                @csrf
                <button type="submit" class="text-[#A3AED0] hover:text-red-500 hover:bg-red-50 p-2 rounded-xl transition-colors cursor-pointer" title="Cerrar Sesión">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>
