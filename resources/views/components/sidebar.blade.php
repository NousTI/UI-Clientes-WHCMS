<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-[#F4F7FE] bg-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shrink-0 shadow-sm"
>
    <!-- Cabecera / Logotipo (Estilo Venus Mockup) -->
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-[#F4F7FE] px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
            <!-- Icono Cuadrado Violeta-Azul -->
            <div class="h-10 w-10 rounded-xl bg-[#4318FF] text-white flex items-center justify-center shadow-md shadow-[#4318FF]/20 select-none">
                < />
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-base font-black tracking-wider text-[#4318FF]">NOUS</span>
                <span class="text-[8px] font-bold text-[#4318FF] tracking-widest mt-0.5">technologies</span>
            </div>
        </a>
        <!-- Botón cerrar móvil -->
        <button @click="sidebarOpen = false" class="lg:hidden text-[#A3AED0] hover:text-[#1B254B] p-1.5 rounded-lg transition-colors cursor-pointer">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navegación -->
    <div class="flex-1 overflow-y-auto py-6 space-y-6">
        
        <!-- Active / Passive Link: Client Area (Estilo Venus Solid Pill) -->
        <div class="px-4">
            <a href="{{ route('dashboard') }}" 
               class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                <!-- Icono Casa -->
                <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Área de Cliente</span>
            </a>
        </div>

        <!-- Grupo 1: PRINCIPAL -->
        <div class="space-y-1.5">
            <h3 class="px-8 text-[9px] font-extrabold tracking-wider text-[#A3AED0]/80 uppercase">Principal</h3>
            <div class="space-y-1">
                <!-- Servicios -->
                <div class="px-4">
                    <a href="{{ route('services') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('services') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('services') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span>Servicios</span>
                    </a>
                </div>

                <!-- Dominios -->
                <div class="px-4">
                    <a href="{{ route('domains') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('domains') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('domains') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="6" />
                            <path d="M3.6 18c1.8-2.7 4.8-6.3 8.4-9.6 3.6-3.3 6.9-5.1 8.4-3.6.8.8.7 2.2-.2 4-1 2-3.4 4.8-6.8 7.8-3.4 3-6.5 5.1-8.4 4.6-.9-.3-1.2-1.4-1.4-3.2z" />
                        </svg>
                        <span>Dominios</span>
                    </a>
                </div>

                <!-- Facturas -->
                <div class="px-4">
                    <a href="{{ route('invoices') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('invoices') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('invoices') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Facturas</span>
                    </a>
                </div>

                <!-- Tickets de Soporte -->
                <div class="px-4">
                    <a href="{{ route('tickets') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('tickets') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('tickets') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                        <span>Tickets de Soporte</span>
                        <span class="ml-auto inline-flex items-center justify-center h-4 min-w-4 px-1 rounded-full text-[8px] font-black {{ request()->routeIs('tickets') ? 'bg-white/25 text-white' : 'bg-red-500 text-white' }}">2</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grupo 2: CUENTA -->
        <div class="space-y-1.5">
            <h3 class="px-8 text-[9px] font-extrabold tracking-wider text-[#A3AED0]/80 uppercase">Cuenta</h3>
            <div class="space-y-1">
                <!-- Detalles de Cuenta -->
                <div class="px-4">
                    <a href="{{ route('profile.edit') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('profile.edit') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('profile.edit') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span>Detalles de Cuenta</span>
                    </a>
                </div>

                <!-- Seguridad -->
                <div class="px-4">
                    <a href="{{ route('security.edit') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('security.edit') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('security.edit') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <span>Seguridad</span>
                    </a>
                </div>

                <div class="px-4">
                    <a href="{{ route('affiliates') }}"
                       class="group flex items-center px-4 py-3 text-sm font-bold transition-all duration-150 rounded-xl {{ request()->routeIs('affiliates') ? 'bg-[#4318FF] text-white shadow-[0px_10px_20px_rgba(67,24,255,0.15)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]/50' }}">
                        <svg class="h-5 w-5 mr-3 shrink-0 {{ request()->routeIs('affiliates') ? 'text-white' : 'text-[#A3AED0] group-hover:text-[#1B254B]' }} transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Afiliados</span>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Panel de Usuario Inferior / Log Out -->
    <div class="shrink-0 border-t border-[#F4F7FE] p-4 bg-white space-y-3">
        <form method="POST" action="{{ route('logout') }}" id="sidebar-logout-form" class="px-2">
            @csrf
            <button type="submit" class="group w-full flex items-center py-2 text-sm font-bold text-[#A3AED0] hover:text-[#1B254B] transition-all duration-150 cursor-pointer">
                <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-colors duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>
</aside>