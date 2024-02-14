<?php

namespace App\Livewire\Backoffice\Components\Doctors;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $scheduleTimerCustom = false;

    public int $weekdaySelected = 0;
    public array $timersSelected = [];

    public array $timers = [
        1 => '09:00 - 12:00',
        2 => '12:00 - 14:00',
        3 => '14:00 - 17:00',
        4 => '17:00 - 19:00',
        5 => '19:00 - 21:00',
        6 => '21:00 - 23:00'
    ];

    public function changeSelectWeekdayClickEvent(int $weekday): void
    {
        if ($weekday >= 1 && $weekday <= 7) {
            if(!array_key_exists($weekday, $this->timersSelected)){
                $this->weekdaySelected = $weekday;
                $this->timersSelected[$weekday] = [];
            }else{
                $this->weekdaySelected = $weekday;
            }
        } else {
            $this->reset('weekdaySelected');
        }
    }

    public function changeTimerPerWeekdayClickEvent(int $timer): void
    {
        if ($timer >= 1 && $timer <= 6) {
            if(!in_array($this->timers[$timer], $this->timersSelected[$this->weekdaySelected])) {
                $this->timersSelected[$this->weekdaySelected][] = $this->timers[$timer];
            }else{
                $key = array_search($this->timers[$timer], $this->timersSelected[$this->weekdaySelected]);
                unset($this->timersSelected[$this->weekdaySelected][$key]);
            }
        }
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.backoffice.components.doctors.schedule-component');
    }
}
