<?php

namespace App\Livewire\Backoffice;

use App\Models\Speciality;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppSpecialitiesComponent extends Component
{

    public function deleteSpeciality(string $slug): void
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();
        $speciality->delete();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $specialities_counter = Speciality::count();
        $specialities = Speciality::all();

        return view('livewire.backoffice.app-specialities-component')
            ->with([
                'specialities_counter' => $specialities_counter,
                'specialities' => $specialities
            ]);
    }
}
