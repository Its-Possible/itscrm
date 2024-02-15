<?php

namespace App\Livewire\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class ModalComponent extends Component
{
    public $title;
    public $message;
    public $actions;

    public function cancel(): void
    {
        $this->dispatch('modal-response', action: 'cancel');
    }

    public function delete(): void
    {
        $this->dispatch('modal-response', action: 'delete');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.components.modal-component');
    }
}
