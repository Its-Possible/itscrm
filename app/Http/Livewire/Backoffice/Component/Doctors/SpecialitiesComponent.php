<?php

namespace App\Http\Livewire\Backoffice\Component\Doctors;

use App\Models\Speciality;
use Livewire\Component;

class SpecialitiesComponent extends Component
{
    public $specialities_selected = [];
    public $select_value;

    public function selectSpeciality(): void
    {
         array_push($this->specialities_selected, $this->select_value);
    }

    public function render()
    {
        $specialities = Speciality::all();

        return view('livewire.backoffice.component.doctors.specialities-component')
            ->with([
               'specialities' => $specialities,
               'specialities_selected' => $this->specialities_selected
            ]);
    }
}
