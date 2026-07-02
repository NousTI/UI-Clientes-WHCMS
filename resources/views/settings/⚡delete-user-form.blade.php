<?php

use Livewire\Component;

new class extends Component {}; ?>

<div>
    <flux:modal.trigger name="confirm-user-deletion">
        <button
            type="button"
            data-test="delete-user-button"
            class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 active:scale-95 text-white text-xs font-extrabold px-4 py-2.5 rounded-xl shadow-[0px_6px_16px_rgba(239,68,68,0.20)] transition-all duration-150 cursor-pointer shrink-0"
        >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
            </svg>
            Eliminar Cuenta
        </button>
    </flux:modal.trigger>

    <livewire:settings::delete-user-modal />
</div>
