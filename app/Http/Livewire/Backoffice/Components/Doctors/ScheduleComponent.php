<?php

namespace App\Http\Livewire\Backoffice\Components\Doctors;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $custom = false;
    public $daysweekSelected = [];
    public $timerSelected = [];
    public $timerCustom = [];
    public $quantityTimerCustom = 1;

    public function setDaysweekSelected(string $dayweek): void
    {
        if(!in_array($dayweek, $this->daysweekSelected)) {
            $this->daysweekSelected[] = $dayweek;
        }else{
            $key = array_search($dayweek, $this->daysweekSelected);
            unset($this->daysweekSelected[$key]);
        }
    }

    public function setTimerSelected(string $timer): void
    {
        if(!in_array($timer, $this->timerSelected)) {
            $this->timerSelected[] = $timer;
        }else{
            $key = array_search($timer, $this->timerSelected);
            unset($this->timerSelected[$key]);
        }
    }

    public function setTimerCustom(string $start, string $end): void
    {
        $this->timerCustom[] = ['start' => $start, 'end' => $end];
    }

    public function addQuantityTimerCustom(): void
    {
        $this->quantityTimerCustom++;
    }

    public function removeQuantityTimerCustom(): void
    {
        $this->quantityTimerCustom--;
    }

    public function setCustom(): void
    {
        if($this->custom) $this->custom = false;
        else $this->custom = true;
    }

    public function addSchedule(): void
    {
        $this->timerSelected = [];
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.backoffice.components.doctors.schedule-component');
    }
}
