<?php

use App\Concerns\ProfileValidationRules;
/* @chisel-email-verification */
use Illuminate\Contracts\Auth\MustVerifyEmail;
/* @end-chisel-email-verification */
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Detalles de Cuenta')] class extends Component {
    use ProfileValidationRules;

    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate($this->profileRules($user->id));

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Flux::toast(variant: 'success', text: __('Perfil actualizado correctamente.'));
    }

    /* @chisel-email-verification */
    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    #[Computed]
    public function hasUnverifiedEmail(): bool
    {
        return Auth::user() instanceof MustVerifyEmail && ! Auth::user()->hasVerifiedEmail();
    }

    #[Computed]
    public function showDeleteUser(): bool
    {
        return ! Auth::user() instanceof MustVerifyEmail
            || (Auth::user() instanceof MustVerifyEmail && Auth::user()->hasVerifiedEmail());
    }
    /* @end-chisel-email-verification */
}; ?>

<div class="space-y-6">

    {{-- ─── Page Header ─────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Detalles de Cuenta</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Administra tu información personal y preferencias de cuenta</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── LEFT COLUMN: Avatar Card ─────────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Avatar Card --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50 flex flex-col items-center text-center">
                {{-- Avatar Circle --}}
                <div class="relative mb-4">
                    <div class="h-24 w-24 rounded-2xl bg-gradient-to-br from-[#868CFF] to-[#4318FF] flex items-center justify-center shadow-[0px_10px_30px_rgba(67,24,255,0.25)] select-none">
                        <span class="text-3xl font-black text-white leading-none">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    {{-- Online indicator --}}
                    <span class="absolute bottom-1 right-1 h-4 w-4 rounded-full bg-emerald-500 border-2 border-white shadow-sm"></span>
                </div>

                <h2 class="text-base font-extrabold text-[#1B254B] tracking-tight">{{ Auth::user()->name }}</h2>
                <p class="text-xs text-[#A3AED0] font-semibold mt-0.5">{{ Auth::user()->email }}</p>

                {{-- Account badge --}}
                <span class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-extrabold bg-[#4318FF]/10 text-[#4318FF]">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#4318FF]"></span>
                    Cliente Activo
                </span>

                <div class="w-full mt-5 pt-5 border-t border-[#F4F7FE] space-y-3">
                    {{-- Info rows --}}
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-semibold text-[#A3AED0]">Miembro desde</span>
                        <span class="font-bold text-[#1B254B]">{{ Auth::user()->created_at->format('M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-semibold text-[#A3AED0]">ID de Cliente</span>
                        <span class="font-bold text-[#1B254B]">#{{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="font-semibold text-[#A3AED0]">Estado</span>
                        <span class="inline-flex items-center gap-1 font-bold text-emerald-500">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Verificado
                        </span>
                    </div>
                </div>
            </div>

            {{-- Quick Actions Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Acciones Rápidas</h3>
                <div class="space-y-2">
                    <a href="{{ route('security.edit') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#F4F7FE] transition-colors duration-150">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 group-hover:bg-[#4318FF] group-hover:text-white transition-all duration-150">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-[#1B254B] group-hover:text-[#4318FF] transition-colors">Cambiar Contraseña</span>
                            <span class="text-[10px] text-[#A3AED0] font-semibold">Actualiza tu seguridad</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] ml-auto shrink-0 group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </a>
                    <a href="{{ route('security.edit') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#F4F7FE] transition-colors duration-150">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 group-hover:bg-[#4318FF] group-hover:text-white transition-all duration-150">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-[#1B254B] group-hover:text-[#4318FF] transition-colors">Autenticación 2FA</span>
                            <span class="text-[10px] text-[#A3AED0] font-semibold">Protección extra para tu cuenta</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] ml-auto shrink-0 group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </a>
                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#F4F7FE] transition-colors duration-150">
                        <div class="h-8 w-8 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 group-hover:bg-[#4318FF] group-hover:text-white transition-all duration-150">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                            </svg>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-[#1B254B] group-hover:text-[#4318FF] transition-colors">Ir al Dashboard</span>
                            <span class="text-[10px] text-[#A3AED0] font-semibold">Volver al panel principal</span>
                        </div>
                        <svg class="h-4 w-4 text-[#A3AED0] ml-auto shrink-0 group-hover:text-[#4318FF] group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- ─── RIGHT COLUMN: Edit Forms ─────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- Profile Information Card --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                {{-- Card Header --}}
                <div class="flex items-center justify-between mb-6">
                    <div class="flex flex-col">
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Información Personal</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Actualiza tu nombre y dirección de correo electrónico</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                    </div>
                </div>

                <form wire:submit="updateProfileInformation" class="space-y-5">
                    {{-- Name Field --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#1B254B]">Nombre Completo</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="name"
                                type="text"
                                id="name"
                                name="name"
                                required
                                autofocus
                                autocomplete="name"
                                class="block w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-11 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-150"
                                placeholder="Tu nombre completo"
                            >
                        </div>
                        @error('name')
                            <p class="text-[10px] font-bold text-red-500 flex items-center gap-1 mt-1">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Email Field --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#1B254B]">Correo Electrónico</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                                </svg>
                            </div>
                            <input
                                wire:model="email"
                                type="email"
                                id="email"
                                name="email"
                                required
                                autocomplete="email"
                                class="block w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-11 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-150"
                                placeholder="tu@correo.com"
                            >
                        </div>
                        @error('email')
                            <p class="text-[10px] font-bold text-red-500 flex items-center gap-1 mt-1">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror

                        {{-- @chisel-email-verification --}}
                        @if ($this->hasUnverifiedEmail)
                            <div class="mt-2 flex items-start gap-2 p-3 rounded-xl bg-amber-50 border border-amber-100">
                                <svg class="h-4 w-4 text-amber-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                </svg>
                                <div class="flex flex-col gap-1">
                                    <p class="text-[10px] font-bold text-amber-700">Tu correo electrónico no está verificado.</p>
                                    <button type="button" wire:click.prevent="resendVerificationNotification" class="text-[10px] font-bold text-[#4318FF] hover:underline cursor-pointer text-left">
                                        Haz clic aquí para reenviar el correo de verificación.
                                    </button>
                                </div>
                            </div>

                            @if (session('status') === 'verification-link-sent')
                                <div class="mt-2 flex items-center gap-2 p-3 rounded-xl bg-emerald-50 border border-emerald-100">
                                    <svg class="h-4 w-4 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-[10px] font-bold text-emerald-700">Se ha enviado un nuevo enlace de verificación a tu correo electrónico.</p>
                                </div>
                            @endif
                        @endif
                        {{-- @end-chisel-email-verification --}}
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex items-center justify-between pt-2 border-t border-[#F4F7FE]">
                        <p class="text-[10px] text-[#A3AED0] font-semibold">Los cambios se guardarán inmediatamente.</p>
                        <button
                            type="submit"
                            data-test="update-profile-button"
                            class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 cursor-pointer overflow-hidden group"
                        >
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                            <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="relative z-10">Guardar Cambios</span>
                            <span wire:loading wire:target="updateProfileInformation" class="relative z-10">
                                <svg class="animate-spin h-3.5 w-3.5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Account Info Summary Card --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Resumen de la Cuenta</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Información general de tu cuenta</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                        </svg>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    {{-- Stat: Servicios --}}
                    <div class="bg-[#F4F7FE] rounded-xl p-4 flex flex-col gap-1">
                        <span class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider">Servicios</span>
                        <span class="text-2xl font-black text-[#1B254B]">3</span>
                        <span class="text-[10px] font-semibold text-emerald-500 flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Todos activos
                        </span>
                    </div>
                    {{-- Stat: Dominios --}}
                    <div class="bg-[#F4F7FE] rounded-xl p-4 flex flex-col gap-1">
                        <span class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider">Dominios</span>
                        <span class="text-2xl font-black text-[#1B254B]">2</span>
                        <span class="text-[10px] font-semibold text-[#A3AED0] flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#4318FF]"></span>
                            Registrados
                        </span>
                    </div>
                    {{-- Stat: Facturas --}}
                    <div class="bg-[#F4F7FE] rounded-xl p-4 flex flex-col gap-1">
                        <span class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider">Facturas</span>
                        <span class="text-2xl font-black text-[#1B254B]">1</span>
                        <span class="text-[10px] font-semibold text-amber-500 flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                            Pendiente de pago
                        </span>
                    </div>
                </div>
            </div>

            {{-- ─── Danger Zone ─────────────────────────────────────── --}}
            {{-- @chisel-email-verification --}}
            @if ($this->showDeleteUser)
            {{-- @end-chisel-email-verification --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-red-100/60">
                {{-- Card Header --}}
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Zona de Peligro</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Acciones irreversibles para tu cuenta</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-xl bg-red-50/60 border border-red-100">
                    <div class="flex flex-col gap-0.5">
                        <span class="text-xs font-extrabold text-[#1B254B]">Eliminar cuenta permanentemente</span>
                        <span class="text-[10px] text-[#A3AED0] font-semibold">Una vez eliminada, todos tus datos serán borrados de forma definitiva.</span>
                    </div>
                    <livewire:settings::delete-user-form />
                </div>
            </div>
            {{-- @chisel-email-verification --}}
            @endif
            {{-- @end-chisel-email-verification --}}

        </div>{{-- / RIGHT COLUMN --}}
    </div>
</div>
