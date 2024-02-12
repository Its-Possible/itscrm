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

    public function setCustomEventHandler(): void
    {
        if(!$this->custom){
            $this->custom = false;
        }else{
            $this->custom = true;
        }
    }

    public function selectWeekdayEventHandler($weekday): void
    {
        $this->weekdaySelected = $weekday;
        if(!array_key_exists($weekday, $this->timestampsSelected)){
            $this->timestampsSelected[$weekday] = [];
        }else{
            unset($this->timestampsSelected[$weekday]);
        }
    }

    public function selectTimerPerWeekdayEventHandler(string $timer): void
    {
        array_push($this->timestampsSelected[$this->weekdaySelected], $timer);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.backoffice.components.doctors.schedule-component');
    }
}
