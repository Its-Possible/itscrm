<?php

namespace App\Http\Livewire\Backoffice;

use Livewire\Component;
use App\Models\Campaign;
use App\Services\BrevoService;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Foundation\Application;

class AppCampaignsComponent extends Component
{

    private BrevoService $brevo;

    public function import(): void
    {
        Artisan::call('import:campaigns');

        $this->emit('refreshComponent');
    }

    public function delete(string $code): void
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

    public function render(): View|Factory|Application
    {

        $campaigns = Campaign::with('tags');

        return view('livewire.backoffice.app-campaigns-component')
            ->with([
                'campaigns' => $campaigns->paginate(30),
                'campaigns_counter' => $campaigns->count()
            ]);
    }
}
