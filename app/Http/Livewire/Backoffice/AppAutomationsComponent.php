<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Automation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppAutomationsComponent extends Component
{

    public function render(): Factory|View|Application
    {
        $automations = Automation::all();

        return view('livewire.backoffice.app-automations-component')
            ->with([
                'automations' => $automations,
                'automations_counter' => Automation::count()
            ]);
    }
}
