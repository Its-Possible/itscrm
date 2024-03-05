<?php

namespace App\Livewire\Backoffice\Components\Tasks;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $repeat = "off";
    public $repetition;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.backoffice.components.tasks.schedule-component');
    }
}
