<?php

namespace App\Livewire\Backoffice;

use App\Models\Campaign;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use Livewire\Component;

class AppCampaignsComponent extends Component
{
    public $campaigns;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function importClickEventHandler(): void
    {
        Artisan::call("import:campaigns");
    }

    public function deleteClickEventHandler(int $id): void
    {
        Campaign::find($id)->delete();
    }

    public function mount(): void
    {
        $this->campaigns = Campaign::all();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.backoffice.app-campaigns-component');
    }
}
