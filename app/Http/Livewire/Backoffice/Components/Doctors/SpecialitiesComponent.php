<?php

namespace App\Http\Livewire\Backoffice\Components\Doctors;

use App\Models\Speciality;
use Livewire\Component;

class SpecialitiesComponent extends Component
{
    public $selected = "none";
    public $doctorFromSpecialities = [];

    public $specialities;

    public function selectSpeciality(): void
    {
        $speciality = Speciality::where('slug', $this->selected)->firstOrFail();

        if(!array_key_exists($this->selected, $this->doctorFromSpecialities)) {
            $this->doctorFromSpecialities = array_merge($this->doctorFromSpecialities, [$speciality->slug => $speciality->name]);

            // TODO: Remove speciality add
        }

        $this->selected = "none"; // Select to value default
    }

    public function removeSpeciality(string $slug)
    {
        unset($this->doctorFromSpecialities[$slug]);
    }

    public function render()
    {
        $this->specialities = Speciality::all();

        return view('livewire.backoffice.components.doctors.specialities-component')
            ->with([
               'specialities' => $this->specialities,
               'doctorFromSpecialities' => $this->doctorFromSpecialities
            ]);
    }
}
