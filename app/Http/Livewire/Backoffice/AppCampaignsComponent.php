<?php

namespace App\Http\Livewire\Backoffice;

use App\Services\BrevoService;
use Livewire\Component;
use App\Models\Campaign;
use Illuminate\Support\Facades\Artisan;

class AppCampaignsComponent extends Component
{

    private BrevoService $brevo;

    public function import()
    {
        Artisan::call('import:campaigns');

        $this->emit('refreshComponent');
    }

    public function delete(string $code)
    {
        $this->brevo = new BrevoService();
        $campaign = Campaign::where('code', $code);

        if($campaign->exists())
        {
            $this->brevo->deleteCampaign($campaign->firstOrFail()->code);
            $campaign->delete();
            $this->emit('refreshComponent');
        }

    }

    public function render()
    {

        $campaigns = Campaign::with('tags');

        return view('livewire.backoffice.app-campaigns-component')
            ->with([
                'campaigns' => $campaigns->paginate(30),
                'campaigns_counter' => $campaigns->count()
            ]);
    }
}
