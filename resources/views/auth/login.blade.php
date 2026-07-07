<x-layouts::auth.simple :title="__('Iniciar Sesión')">

    {{-- Card wrapper --}}
    <div class="bg-white rounded-[24px] p-8 shadow-[0px_24px_60px_rgba(112,144,176,0.10)] border border-white/60">

        {{-- Header --}}
        <div class="mb-7">
            <h2 class="text-2xl font-black text-[#1B254B] tracking-tight leading-tight mb-1.5">Bienvenido de nuevo</h2>
            <p class="text-sm font-semibold text-[#A3AED0]">Ingresa tus credenciales para acceder al panel</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-5 flex items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-xs font-bold text-emerald-700">
                <svg class="h-4 w-4 shrink-0 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('status') }}
            </div>
        @endif

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
        <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
            @csrf

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
                        autofocus
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
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-extrabold text-[#1B254B]">Contraseña</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[10px] font-extrabold text-[#4318FF] hover:text-[#3311CC] transition-colors">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                        <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                    </div>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="block w-full rounded-xl border @error('password') border-red-400 bg-red-50 @else border-[#E2E8F0] bg-[#F4F7FE] @enderror pl-10 pr-4 py-3 text-sm font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-200"
                    >
                </div>
                @error('password')
                    <p class="mt-1 text-[10px] font-bold text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center gap-2.5">
                <input
                    id="remember"
                    name="remember"
                    type="checkbox"
                    {{ old('remember') ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-[#E2E8F0] text-[#4318FF] focus:ring-[#4318FF]/30 cursor-pointer"
                >
                <label for="remember" class="text-xs font-semibold text-[#A3AED0] cursor-pointer select-none">Recordar mi sesión</label>
            </div>

            {{-- Submit --}}
            <button
                type="submit"
                data-test="login-button"
                class="relative w-full overflow-hidden flex items-center justify-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-[0.98] text-white text-sm font-extrabold py-3 px-4 rounded-xl shadow-[0px_8px_24px_rgba(67,24,255,0.25)] transition-all duration-200 cursor-pointer group"
            >
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/></svg>
                <span class="relative z-10">Iniciar Sesión</span>
            </button>
        </form>

        {{-- Divider --}}
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-[#E2E8F0]"></div></div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-[10px] font-bold text-[#A3AED0]">¿No tienes cuenta?</span>
            </div>
        </div>

        {{-- Register link --}}
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 w-full border-2 border-[#E2E8F0] hover:border-[#4318FF]/30 hover:bg-[#4318FF]/5 text-[#1B254B] text-sm font-extrabold py-3 px-4 rounded-xl transition-all duration-200 cursor-pointer group">
                <svg class="h-4 w-4 text-[#4318FF] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                Crear cuenta nueva
            </a>
        @endif
    </div>

    {{-- Footer note --}}
    <p class="mt-6 text-center text-[10px] font-semibold text-[#A3AED0]">
        Al iniciar sesión aceptas nuestros
        <a href="#" class="text-[#4318FF] hover:underline font-extrabold">Términos de Servicio</a>
        y
        <a href="#" class="text-[#4318FF] hover:underline font-extrabold">Política de Privacidad</a>
    </p>

</x-layouts::auth.simple>
