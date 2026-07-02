<?php

use App\Concerns\PasswordValidationRules;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Livewire\Attributes\Title;
use Livewire\Component;
/* @chisel-passkeys */
use Laravel\Passkeys\Actions\DeletePasskey;
use Livewire\Attributes\Locked;
/* @end-chisel-passkeys */
/* @chisel-2fa */
use Livewire\Attributes\On;
/* @end-chisel-2fa */

new #[Title('Seguridad')] class extends Component {
    use PasswordValidationRules;

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /* @chisel-2fa */
    public bool $canManageTwoFactor;

    public bool $twoFactorEnabled;

    public bool $requiresConfirmation;
    /* @end-chisel-2fa */

    /* @chisel-passkeys */
    #[Locked]
    public bool $canManagePasskeys;

    #[Locked]
    public array $passkeys = [];

    public bool $showDeleteModal = false;

    #[Locked]
    public ?int $deletingPasskeyId = null;

    #[Locked]
    public string $deletingPasskeyName = '';
    /* @end-chisel-passkeys */

    /**
     * Mount the component.
     */
    public function mount(DisableTwoFactorAuthentication $disableTwoFactorAuthentication): void
    {
        /* @chisel-2fa */
        $this->canManageTwoFactor = Features::canManageTwoFactorAuthentication();

        if ($this->canManageTwoFactor) {
            if (Fortify::confirmsTwoFactorAuthentication() && is_null(auth()->user()->two_factor_confirmed_at)) {
                $disableTwoFactorAuthentication(auth()->user());
            }

            $this->twoFactorEnabled = auth()->user()->hasEnabledTwoFactorAuthentication();
            $this->requiresConfirmation = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirm');
        }
        /* @end-chisel-2fa */

        /* @chisel-passkeys */
        $this->canManagePasskeys = Features::canManagePasskeys();

        if ($this->canManagePasskeys) {
            $this->loadPasskeys();
        }
        /* @end-chisel-passkeys */
    }

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => $this->currentPasswordRules(),
                'password' => $this->passwordRules(),
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => $validated['password'],
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        Flux::toast(variant: 'success', text: __('Contraseña actualizada correctamente.'));
    }

    /* @chisel-passkeys */
    /**
     * Load the user's passkeys.
     */
    public function loadPasskeys(): void
    {
        $this->passkeys = auth()->user()->passkeys()
            ->select(['id', 'name', 'credential', 'created_at', 'last_used_at'])
            ->latest()
            ->get()
            ->map(fn ($passkey) => [
                'id' => $passkey->id,
                'name' => $passkey->name,
                'authenticator' => $passkey->authenticator,
                'created_at_diff' => $passkey->created_at->diffForHumans(),
                'last_used_at_diff' => $passkey->last_used_at?->diffForHumans(),
            ])
            ->toArray();
    }

    /**
     * Show the delete confirmation modal.
     */
    public function confirmDelete(int $passkeyId): void
    {
        $passkey = auth()->user()->passkeys()->findOrFail($passkeyId);

        $this->deletingPasskeyId = $passkey->id;
        $this->deletingPasskeyName = $passkey->name;
        $this->showDeleteModal = true;
    }

    /**
     * Delete the passkey.
     */
    public function deletePasskey(DeletePasskey $deletePasskey): void
    {
        if (! $this->deletingPasskeyId) {
            return;
        }

        $passkey = auth()->user()->passkeys()->findOrFail($this->deletingPasskeyId);

        $deletePasskey(auth()->user(), $passkey);

        $this->closeDeleteModal();
        $this->loadPasskeys();
    }

    /**
     * Close the delete confirmation modal.
     */
    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
        $this->deletingPasskeyId = null;
        $this->deletingPasskeyName = '';
    }
    /* @end-chisel-passkeys */

    /* @chisel-2fa */
    /**
     * Handle the two-factor authentication enabled event.
     */
    #[On('two-factor-enabled')]
    public function onTwoFactorEnabled(): void
    {
        $this->twoFactorEnabled = true;
    }

    /**
     * Disable two-factor authentication for the user.
     */
    public function disable(DisableTwoFactorAuthentication $disableTwoFactorAuthentication): void
    {
        $disableTwoFactorAuthentication(auth()->user());

        $this->twoFactorEnabled = false;
    }
    /* @end-chisel-2fa */
}; ?>

<div class="space-y-6">

    {{-- ─── Page Header ─────────────────────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#1B254B] tracking-tight leading-tight">Seguridad</h1>
            <p class="text-xs font-semibold text-[#A3AED0] mt-1">Gestiona la seguridad y el acceso a tu cuenta</p>
        </div>
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[10px] font-bold text-[#A3AED0]">
            <a href="{{ route('dashboard') }}" class="hover:text-[#4318FF] transition-colors">Inicio</a>
            <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
            <span class="text-[#4318FF]">Seguridad</span>
        </div>
    </div>

    {{-- ─── Settings Nav Tabs ────────────────────────────────────────── --}}
    <div class="flex items-center gap-1 bg-white rounded-2xl p-1.5 shadow-[0px_4px_20px_rgba(112,144,176,0.08)] border border-white/50 w-fit">
        <a href="{{ route('profile.edit') }}"
           class="{{ request()->routeIs('profile.edit') ? 'bg-[#4318FF] text-white shadow-[0px_6px_16px_rgba(67,24,255,0.20)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]' }} flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold transition-all duration-150">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
            </svg>
            Perfil
        </a>
        <a href="{{ route('security.edit') }}"
           class="{{ request()->routeIs('security.edit') ? 'bg-[#4318FF] text-white shadow-[0px_6px_16px_rgba(67,24,255,0.20)]' : 'text-[#A3AED0] hover:text-[#1B254B] hover:bg-[#F4F7FE]' }} flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold transition-all duration-150">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
            </svg>
            Seguridad
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ─── LEFT: Security Score Card ───────────────────────────── --}}
        <div class="lg:col-span-1 space-y-5">

            {{-- Security Score --}}
            <div class="bg-gradient-to-br from-[#868CFF] via-[#5C5CFF] to-[#4318FF] rounded-[20px] p-6 text-white relative overflow-hidden shadow-[0px_18px_40px_rgba(67,24,255,0.18)] select-none">
                {{-- Glow overlay --}}
                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/8 to-white/0 transform skew-y-12"></div>

                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-white/70">Puntuación de Seguridad</span>
                        <div class="h-8 w-8 rounded-lg bg-white/15 flex items-center justify-center">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Score ring --}}
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative h-16 w-16 shrink-0">
                            <svg class="h-16 w-16 -rotate-90" viewBox="0 0 64 64">
                                <circle cx="32" cy="32" r="28" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="6"/>
                                <circle cx="32" cy="32" r="28" fill="none" stroke="white" stroke-width="6"
                                        stroke-dasharray="{{ $canManageTwoFactor && $twoFactorEnabled ? '123' : '88' }} 176"
                                        stroke-linecap="round"/>
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center text-sm font-black text-white">
                                {{ $canManageTwoFactor && $twoFactorEnabled ? '70%' : '50%' }}
                            </span>
                        </div>
                        <div>
                            <p class="text-xl font-black leading-tight">{{ $canManageTwoFactor && $twoFactorEnabled ? 'Buena' : 'Básica' }}</p>
                            <p class="text-[10px] text-white/70 font-semibold mt-0.5">Activa el 2FA para mejorar</p>
                        </div>
                    </div>

                    {{-- Checklist --}}
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <div class="h-5 w-5 rounded-full bg-emerald-400/25 flex items-center justify-center shrink-0">
                                <svg class="h-3 w-3 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                            </div>
                            <span class="text-[10px] font-bold text-white/90">Contraseña configurada</span>
                        </div>
                        <div class="flex items-center gap-2">
                            @if ($canManageTwoFactor && $twoFactorEnabled)
                                <div class="h-5 w-5 rounded-full bg-emerald-400/25 flex items-center justify-center shrink-0">
                                    <svg class="h-3 w-3 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold text-white/90">2FA activado</span>
                            @else
                                <div class="h-5 w-5 rounded-full bg-white/10 flex items-center justify-center shrink-0">
                                    <svg class="h-3 w-3 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold text-white/50">2FA no activado</span>
                            @endif
                        </div>
                        @if ($canManagePasskeys)
                        <div class="flex items-center gap-2">
                            @if (count($passkeys) > 0)
                                <div class="h-5 w-5 rounded-full bg-emerald-400/25 flex items-center justify-center shrink-0">
                                    <svg class="h-3 w-3 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold text-white/90">Passkey registrada</span>
                            @else
                                <div class="h-5 w-5 rounded-full bg-white/10 flex items-center justify-center shrink-0">
                                    <svg class="h-3 w-3 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold text-white/50">Sin passkeys</span>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Tips Card --}}
            <div class="bg-white rounded-[20px] p-5 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <h3 class="text-xs font-extrabold text-[#1B254B] mb-4 tracking-tight">Consejos de Seguridad</h3>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <div class="h-6 w-6 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                        </div>
                        <p class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Usa una contraseña de al menos 12 caracteres con mayúsculas, números y símbolos.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-6 w-6 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                            </svg>
                        </div>
                        <p class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Activa el 2FA para agregar una capa extra de protección al iniciar sesión.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="h-6 w-6 rounded-lg bg-[#4318FF]/8 text-[#4318FF] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                            </svg>
                        </div>
                        <p class="text-[10px] font-semibold text-[#A3AED0] leading-relaxed">Registra una passkey para iniciar sesión sin contraseña de forma segura.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ─── RIGHT: Security Forms ────────────────────────────────── --}}
        <div class="lg:col-span-2 space-y-5">

            {{-- ── 1. Change Password ──────────────────────────────── --}}
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Cambiar Contraseña</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Asegúrate de usar una contraseña larga y aleatoria</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                </div>

                <form method="POST" wire:submit="updatePassword" class="space-y-4">
                    {{-- Current Password --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#1B254B]">Contraseña Actual</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="current_password"
                                type="password"
                                id="current_password"
                                required
                                autocomplete="current-password"
                                class="block w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-11 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-150"
                                placeholder="••••••••••••"
                            >
                        </div>
                        @error('current_password')
                            <p class="text-[10px] font-bold text-red-500 flex items-center gap-1 mt-1">
                                <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#1B254B]">Nueva Contraseña</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="password"
                                type="password"
                                id="password"
                                required
                                autocomplete="new-password"
                                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                                class="block w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-11 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-150"
                                placeholder="••••••••••••"
                            >
                        </div>
                        @error('password')
                            <p class="text-[10px] font-bold text-red-500 flex items-center gap-1 mt-1">
                                <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-[#1B254B]">Confirmar Nueva Contraseña</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                <svg class="h-4 w-4 text-[#A3AED0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="password_confirmation"
                                type="password"
                                id="password_confirmation"
                                required
                                autocomplete="new-password"
                                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                                class="block w-full rounded-xl border border-[#E2E8F0] bg-[#F4F7FE] py-3 pl-11 pr-4 text-xs font-bold text-[#1B254B] placeholder-[#A3AED0] focus:border-[#4318FF] focus:bg-white focus:ring-2 focus:ring-[#4318FF]/20 focus:outline-none transition-all duration-150"
                                placeholder="••••••••••••"
                            >
                        </div>
                        @error('password_confirmation')
                            <p class="text-[10px] font-bold text-red-500 flex items-center gap-1 mt-1">
                                <svg class="h-3 w-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-2 border-t border-[#F4F7FE]">
                        <p class="text-[10px] text-[#A3AED0] font-semibold">La sesión se mantendrá activa tras el cambio.</p>
                        <button
                            type="submit"
                            data-test="update-password-button"
                            class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 cursor-pointer overflow-hidden group"
                        >
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                            <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                            </svg>
                            <span class="relative z-10">Actualizar Contraseña</span>
                            <span wire:loading wire:target="updatePassword" class="relative z-10">
                                <svg class="animate-spin h-3.5 w-3.5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- ── 2. Two-Factor Authentication ─────────────────────── --}}
            {{-- @chisel-2fa --}}
            @if ($canManageTwoFactor)
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Autenticación de Dos Factores</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Agrega una capa extra de seguridad al iniciar sesión</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl {{ $twoFactorEnabled ? 'bg-emerald-50 text-emerald-500' : 'bg-[#F4F7FE] text-[#A3AED0]' }} flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
                        </svg>
                    </div>
                </div>

                <div wire:cloak>
                    @if ($twoFactorEnabled)
                        {{-- 2FA Enabled State --}}
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-emerald-50 border border-emerald-100 mb-5">
                            <div class="h-9 w-9 rounded-lg bg-emerald-500 text-white flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-extrabold text-emerald-800">2FA Activado</p>
                                <p class="text-[10px] text-emerald-600 font-semibold mt-0.5">Se te pedirá un código seguro cada vez que inicies sesión. Obtén el código desde tu app TOTP.</p>
                            </div>
                        </div>

                        <livewire:settings::two-factor.recovery-codes :$requiresConfirmation />

                        <div class="mt-4 pt-4 border-t border-[#F4F7FE]">
                            <button
                                wire:click="disable"
                                class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_4px_12px_rgba(239,68,68,0.20)] transition-all duration-150 cursor-pointer"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Desactivar 2FA
                            </button>
                        </div>

                    @else
                        {{-- 2FA Disabled State --}}
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-amber-50 border border-amber-100 mb-5">
                            <div class="h-9 w-9 rounded-lg bg-amber-100 text-amber-500 flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-extrabold text-amber-800">2FA Desactivado</p>
                                <p class="text-[10px] text-amber-600 font-semibold mt-0.5">Al activar el 2FA, se te pedirá un código seguro al iniciar sesión. Puedes obtenerlo desde una app TOTP en tu teléfono.</p>
                            </div>
                        </div>

                        <flux:modal.trigger name="two-factor-setup-modal">
                            <button
                                wire:click="$dispatch('start-two-factor-setup')"
                                class="relative inline-flex items-center gap-2 bg-[#4318FF] hover:bg-[#3311CC] active:scale-95 text-white text-xs font-extrabold px-5 py-2.5 rounded-xl shadow-[0px_6px_20px_rgba(67,24,255,0.25)] transition-all duration-150 cursor-pointer overflow-hidden group"
                            >
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/10 to-white/0 transform skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-500"></div>
                                <svg class="h-4 w-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                                </svg>
                                <span class="relative z-10">Activar 2FA</span>
                            </button>
                        </flux:modal.trigger>

                        <livewire:settings::two-factor-setup-modal :requires-confirmation="$requiresConfirmation" />
                    @endif
                </div>
            </div>
            @endif
            {{-- @end-chisel-2fa --}}

            {{-- ── 3. Passkeys ──────────────────────────────────────── --}}
            {{-- @chisel-passkeys --}}
            @if ($canManagePasskeys)
            <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h3 class="text-base font-extrabold text-[#1B254B] tracking-tight">Passkeys</h3>
                        <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5 block">Inicia sesión sin contraseña usando tu dispositivo</span>
                    </div>
                    <div class="h-9 w-9 rounded-xl bg-[#F4F7FE] text-[#4318FF] flex items-center justify-center shrink-0">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                        </svg>
                    </div>
                </div>

                <div wire:cloak class="space-y-3">
                    @forelse ($passkeys as $passkey)
                        <div class="flex items-center justify-between p-4 rounded-xl bg-[#F4F7FE] border border-[#E8EDF6] hover:border-[#4318FF]/20 transition-colors duration-150 {{ ! $loop->last ? 'mb-2' : '' }}">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-lg bg-white text-[#4318FF] border border-[#E8EDF6] flex items-center justify-center shrink-0 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-[#1B254B]">{{ $passkey['name'] }}</span>
                                        @if ($passkey['authenticator'])
                                            <span class="inline-block px-2 py-0.5 rounded-md text-[9px] font-extrabold bg-[#4318FF]/10 text-[#4318FF]">{{ $passkey['authenticator'] }}</span>
                                        @endif
                                    </div>
                                    <p class="text-[10px] text-[#A3AED0] font-semibold mt-0.5">
                                        Agregada {{ $passkey['created_at_diff'] }}
                                        @if ($passkey['last_used_at_diff'])
                                            · Último uso {{ $passkey['last_used_at_diff'] }}
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <button
                                wire:click="confirmDelete({{ $passkey['id'] }})"
                                class="h-8 w-8 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-all duration-150 cursor-pointer shrink-0"
                                title="Eliminar passkey"
                            >
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center p-8 rounded-xl bg-[#F4F7FE] border-2 border-dashed border-[#E2E8F0]">
                            <div class="h-14 w-14 rounded-2xl bg-white text-[#A3AED0] border border-[#E8EDF6] flex items-center justify-center mb-3 shadow-sm">
                                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                                </svg>
                            </div>
                            <p class="text-xs font-extrabold text-[#1B254B]">Sin passkeys registradas</p>
                            <p class="text-[10px] text-[#A3AED0] font-semibold mt-1">Agrega una passkey para iniciar sesión sin contraseña</p>
                        </div>
                    @endforelse

                    <div class="pt-2">
                        <x-passkey-registration />
                    </div>
                </div>
            </div>
            @endif
            {{-- @end-chisel-passkeys --}}

        </div>{{-- / RIGHT COLUMN --}}
    </div>

    {{-- ─── Delete Passkey Modal (Flux) ──────────────────────────────── --}}
    {{-- @chisel-passkeys --}}
    <flux:modal
        name="delete-passkey-modal"
        class="max-w-md md:min-w-md"
        @close="closeDeleteModal"
        wire:model="showDeleteModal"
    >
        <div class="space-y-5">
            <div class="flex items-start gap-4">
                <div class="h-10 w-10 rounded-xl bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-extrabold text-[#1B254B]">Eliminar Passkey</h3>
                    <p class="text-xs text-[#A3AED0] font-semibold mt-1">
                        ¿Seguro que quieres eliminar la passkey <strong class="text-[#1B254B]">"{{ $deletingPasskeyName }}"</strong>? Ya no podrás usarla para iniciar sesión.
                    </p>
                </div>
            </div>

            <div class="flex gap-3 justify-end border-t border-[#F4F7FE] pt-4">
                <button
                    wire:click="closeDeleteModal"
                    class="inline-flex items-center gap-2 bg-[#F4F7FE] hover:bg-[#E8EDF6] text-[#1B254B] text-xs font-bold px-4 py-2.5 rounded-xl transition-all duration-150 cursor-pointer"
                >
                    Cancelar
                </button>
                <button
                    wire:click="deletePasskey"
                    class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_4px_12px_rgba(239,68,68,0.20)] transition-all duration-150 cursor-pointer"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                    Eliminar Passkey
                </button>
            </div>
        </div>
    </flux:modal>
    {{-- @end-chisel-passkeys --}}

</div>
