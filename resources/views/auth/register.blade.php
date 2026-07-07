<x-layouts::auth.simple :title="__('Crear Cuenta')">

    {{-- Card wrapper --}}
    <div class="bg-white rounded-[24px] p-8 shadow-[0px_24px_60px_rgba(112,144,176,0.10)] border border-white/60">

        {{-- Header --}}
        <div class="mb-7">
            <h2 class="text-2xl font-black text-[#1B254B] tracking-tight leading-tight mb-1.5">Crea tu cuenta</h2>
            <p class="text-sm font-semibold text-[#A3AED0]">Completa tus datos para comenzar en 60 segundos</p>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-xs font-bold text-red-700">
                <div class="flex items-center gap-2 mb-1">
                    <svg class="h-4 w-4 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                    <span>Por favor corrige los siguientes errores:</span>
                </div>
                <ul class="ml-6 list-disc space-y-0.5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            {{-- Full Name --}}
            <div>
                <label for="name" class="block text-xs font-extrabold text-[#1B254B] mb-1.5">Nombre Completo</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                    </div>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Tu nombre completo"
                        class="block w-full rounded-xl border @error('name') border-red-400 bg-red-50 @else border-[#E2E8F0] bg-[#F4F7FE] @enderror pl-10 pr-4 py-3 text-sm font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-200"
                    >
                </div>
                @error('name')
                    <p class="mt-1 text-[10px] font-bold text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-xs font-extrabold text-[#1B254B] mb-1.5">Correo Electrónico</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                    </div>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="correo@ejemplo.com"
                        class="block w-full rounded-xl border @error('email') border-red-400 bg-red-50 @else border-[#E2E8F0] bg-[#F4F7FE] @enderror pl-10 pr-4 py-3 text-sm font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-200"
                    >
                </div>
                @error('email')
                    <p class="mt-1 text-[10px] font-bold text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-xs font-extrabold text-[#1B254B] mb-1.5">Contraseña</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                    </div>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="Mínimo 8 caracteres"
                        class="block w-full rounded-xl border @error('password') border-red-400 bg-red-50 @else border-[#E2E8F0] bg-[#F4F7FE] @enderror pl-10 pr-4 py-3 text-sm font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-200"
                    >
                </div>
                @error('password')
                    <p class="mt-1 text-[10px] font-bold text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-xs font-extrabold text-[#1B254B] mb-1.5">Confirmar Contraseña</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    </div>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="Repite tu contraseña"
                        class="block w-full rounded-xl border @error('password_confirmation') border-red-400 bg-red-50 @else border-[#E2E8F0] bg-[#F4F7FE] @enderror pl-10 pr-4 py-3 text-sm font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-200"
                    >
                </div>
            </div>

            {{-- Terms note --}}
            <p class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">
                Al crear tu cuenta aceptas nuestros
                <a href="#" class="text-[#4318FF] font-extrabold hover:underline">Términos de Servicio</a>
                y
                <a href="#" class="text-[#4318FF] font-extrabold hover:underline">Política de Privacidad</a>.
            </p>

            {{-- Submit --}}
            <button
                type="submit"
                data-test="register-user-button"
                class="relative w-full overflow-hidden flex items-center justify-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-[0.98] text-white text-sm font-extrabold py-3 px-4 rounded-xl shadow-[0px_8px_24px_rgba(67,24,255,0.25)] transition-all duration-200 cursor-pointer group mt-1"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                <span class="relative z-10">Crear Cuenta Gratis</span>
            </button>
        </form>

        {{-- Divider --}}
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-[#E2E8F0]"></div></div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-[10px] font-bold text-[#A3AED0]">¿Ya tienes una cuenta?</span>
            </div>
        </div>

        {{-- Login link --}}
        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full border-2 border-[#E2E8F0] hover:border-[#4318FF]/30 hover:bg-[#4318FF]/5 text-[#1B254B] text-sm font-extrabold py-3 px-4 rounded-xl transition-all duration-200 cursor-pointer group">
            <svg class="h-4 w-4 text-[#4318FF] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/></svg>
            Iniciar sesión
        </a>
    </div>

</x-layouts::auth.simple>
