<?php

namespace App\Http\Livewire\Backoffice\Components\Automations;

use Livewire\Component;

class ScheduleComponent extends Component
{
    public $repeat = "off";
    public $repetition;

    public function render()
    {
        return view('livewire.backoffice.components.automations.schedule-component');
    }
}