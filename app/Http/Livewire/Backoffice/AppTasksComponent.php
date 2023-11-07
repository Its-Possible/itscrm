<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AppTasksComponent extends Component
{

    public function render(): Factory|View|Application
    {
        $tasks = Task::all();

        return view('livewire.backoffice.app-tasks-component')
            ->with([
                'tasks' => $tasks,
                'tasks_counter' => Task::count()
            ]);
    }
}
