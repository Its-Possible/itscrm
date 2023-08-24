<?php

namespace App\Http\Livewire\Backoffice\Components;

use App\Console\Commands\ImportCampaigns;
use App\Models\Campaign;
use Livewire\Component;

class AppCampaignsComponent extends Component
{
    public function render()
    {
        $this->campaigns = Campaign::count();

        return view('livewire.backoffice.components.campaigns-component');
    }
}
