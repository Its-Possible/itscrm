<?php

namespace App\Livewire\Backoffice;

use App\Models\Specialty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppSpecialtiesComponent extends Component
{

    public function specialtyDeleteEvent(string $slug): void
    {
        $specialty = Specialty::where('slug', $slug)->firstOrFail()->delete();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $specialties_counter = Specialty::count();
        $specialties = Specialty::all();

        return view('livewire.backoffice.app-specialties-component')
            ->with([
                'specialties_counter' => $specialties_counter,
                'specialties' => $specialties
            ]);
    }
}
