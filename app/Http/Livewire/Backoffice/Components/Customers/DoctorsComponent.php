<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DoctorsComponent extends Component
{
    public $doctors = [];
    public $specialities = [];

    public $selected;

    public function updateDoctorsFromSpeciality(): void
    {
        $speciality = Speciality::with('doctors')->where('slug', $this->selected)->firstOrFail();
        $this->doctors = $speciality->doctors;
    }

    public function render(): Factory|View|Application
    {

        $this->specialities = Speciality::all();

        return view('livewire.backoffice.components.customers.doctors-component')
            ->with([
                'specialities' => $this->specialities,
                'doctors' => $this->doctors
            ]);
    }
}
