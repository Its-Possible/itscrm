<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Speciality;
use Livewire\Component;

class AppSpecialitiesComponent extends Component
{

    public function deleteSpeciality(string $slug)
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();
        $speciality->delete();
    }

    public function render()
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