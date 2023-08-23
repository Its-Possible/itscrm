<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Campaign;
use Livewire\Component;

class AppCampaignsComponent extends Component
{
    public function render()
    {

        $campaigns = Campaign::with('tags')->paginate(30);

        return view('livewire.backoffice.app-campaigns-component')
            ->with([
                'campaigns' => $campaigns,
                'campaignsCounter' => Campaign::count()
            ]);
    }
}
