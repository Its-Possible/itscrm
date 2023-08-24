<?php

namespace App\Http\Livewire\Backoffice;

use Livewire\Component;
use App\Models\Campaign;
use Illuminate\Support\Facades\Artisan;

class AppCampaignsComponent extends Component
{
    public function import()
    {
        Artisan::call('import:campaigns');

        $this->emit('refreshComponent');
    }

    public function delete(string $code)
    {
        Campaign::where('code', $code)->deleteOrFail();

        $this->emit('refreshComponent');
    }

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
