<aside 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-[#F4F7FE] bg-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 shrink-0 shadow-sm"
>
    <!-- Cabecera / Logotipo (Estilo Venus) -->
    <div class="flex h-20 shrink-0 items-center justify-between border-b border-[#F4F7FE] px-6">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <!-- Icono Nube Venus Accent -->
            <svg class="h-6 w-6 text-[#4318FF]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.502 4.502 0 002.25 15z" />
            </svg>
            <span class="text-lg font-black tracking-wider text-[#1B254B]">
                Nous
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
    <div class="flex-1 overflow-y-auto py-6 space-y-6">
        
        <!-- Active Link: Client Area (Estilo Venus) -->
        <div class="relative flex items-center">
            <a href="{{ route('dashboard') }}" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#1B254B]">
                <!-- Icono Casa en color activo -->
                <svg class="h-5 w-5 mr-3 shrink-0 text-[#4318FF] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Client Area</span>
            </a>
            <!-- Indicador Activo Vertical Derecho (Venus Signature) -->
            <div class="absolute right-0 top-0 h-full w-[4px] bg-[#4318FF] rounded-l-md"></div>
        </div>

        <!-- Grupo 1: MAIN -->
        <div class="space-y-2">
            <h3 class="px-6 text-[10px] font-bold tracking-wider text-[#A3AED0] uppercase">Main</h3>
            <div class="space-y-1">
                <!-- Services -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span>Services</span>
                    </a>
                </div>

                <!-- Domains -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
                        </svg>
                        <span>Domains</span>
                    </a>
                </div>

                <!-- Invoices -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Invoices</span>
                    </a>
                </div>

                <!-- Support Tickets -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2zM12 11a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>
                        <span>Support Tickets</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grupo 2: ACCOUNT -->
        <div class="space-y-2">
            <h3 class="px-6 text-[10px] font-bold tracking-wider text-[#A3AED0] uppercase">Account</h3>
            <div class="space-y-1">
                <!-- Account Details -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span>Account Details</span>
                    </a>
                </div>

                <!-- Security -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <span>Security</span>
                    </a>
                </div>

                <!-- Billing -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                        </svg>
                        <span>Billing</span>
                    </a>
                </div>

                <!-- Affiliates -->
                <div class="relative flex items-center">
                    <a href="#" class="group flex flex-1 items-center px-6 py-2.5 text-sm font-bold transition-all duration-150 text-[#A3AED0] hover:text-[#1B254B]">
                        <svg class="h-5 w-5 mr-3 shrink-0 text-[#A3AED0] group-hover:text-[#1B254B] transition-transform duration-150 group-hover:scale-105" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Affiliates</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Chatbot Card Callout (Estilo Venus Card) -->
        <div class="mx-4 my-6 p-4 rounded-[20px] bg-[#F4F7FE]/60 border border-white/50 relative flex flex-col items-center text-center">
            <!-- Floating Robot Image 
            <img src="/images/robot.png" alt="Robot Assistant" class="h-20 w-auto mb-2 drop-shadow-sm transform hover:scale-105 transition-transform duration-200">
            
            <h4 class="text-xs font-bold text-[#1B254B]">Need Help?</h4>
            <p class="text-[9px] font-semibold text-[#A3AED0] mt-1 mb-3">We're here for you 24/7</p>
            
            <a href="#" class="w-full flex items-center justify-between bg-white hover:bg-[#F4F7FE] text-[10px] font-bold text-[#4318FF] py-2 px-3.5 rounded-xl border border-[#E0E5F2] transition-colors group">
                <span>Contact Support</span>
                <svg class="h-3 w-3 transform group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div> 
    -->
    </div>

    <!-- Panel de Usuario Inferior -->
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