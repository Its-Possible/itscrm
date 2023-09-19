<?php

namespace App\Http\Livewire\Backoffice\Components\Doctors;

use App\Models\Speciality;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SpecialitiesComponent extends Component
{
    public User $user;

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

    public function removeSpeciality(string $slug): void
    {
        unset($this->doctorFromSpecialities[$slug]);
    }

    public function saveSpecialities(int $doctor_id): void
    {
        if(count($this->doctorFromSpecialities) > 0){
            dd($this->doctorFromSpecialities);
        }
    }

    public function render(): Factory|View|Application
    {
        $this->specialities = Speciality::all();

        return view('livewire.backoffice.components.doctors.specialities-component')
            ->with([
               'specialities' => $this->specialities,
               'doctorFromSpecialities' => $this->doctorFromSpecialities
            ]);
    }
}
