<?php

namespace App\Livewire\Backoffice;

use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class AppTasksComponent extends Component
{
    public int $counter = 0;
    public array $tasks;

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        $this->counter = Task::all()->count();

        return view('livewire.backoffice.app-tasks-component');
    }
}
