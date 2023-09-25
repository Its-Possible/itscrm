<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Doctor;
use App\Models\Speciality;
use Google\Service\AIPlatformNotebooks\Schedule;
use Livewire\Component;
use PhpParser\Comment\Doc;

class DoctorsComponent extends Component
{
    public $doctors = [];

    public $selected;

    public function updateDoctorsFromSpeciality()
    {
        $this->doctors = Doctor::with('specialities')->get();
    }

    public function render()
    {

        $specialities = Speciality::all();

        $doctors = Doctor::with('user')->get();

        return view('livewire.backoffice.components.customers.doctors-component')
            ->with([
                'specialities' => $specialities,
                'doctors' => $doctors
            ]);
    }
}
