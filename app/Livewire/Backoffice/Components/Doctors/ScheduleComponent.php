<?php

namespace App\Livewire\Backoffice\Components\Doctors;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $custom = false;

    public int $weekdaySelected = 0;
    public array $timestampsSelected;

    public function weekdaySelectEvent($weekday): void
    {
        $this->weekdaySelected = $weekday;
        if(!array_key_exists($weekday, $this->timestampsSelected)){
            $this->timestampsSelected[$weekday] = [];
        }else{
            unset($this->timestampsSelected[$weekday]);
        }
    }

    public function weekdayTimerSelected(string $timer): void
    {
        array_push($this->timestampsSelected[$this->weekdaySelected], $timer);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.backoffice.components.doctors.schedule-component');
    }
}
