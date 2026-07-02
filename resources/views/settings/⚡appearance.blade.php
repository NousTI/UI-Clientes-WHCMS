<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Apariencia')] class extends Component {
    public function mount(): void
    {
        $this->redirectRoute('profile.edit');
    }
}; ?>

<div></div>
