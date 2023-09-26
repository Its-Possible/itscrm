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
    public $specialities = [];

    public $selected;

    public function updateDoctorsFromSpeciality()
    {
        $this->doctors = Doctor::with('specialities')->get();
        $this->specialities = Speciality::with(['doctors' => function ($query) {
            $query->where('doctor_id', 1);
        }])->get();

        dd($this->doctors);
    }

    public function render()
    {

        $this->specialities = Speciality::all();

        return view('livewire.backoffice.components.customers.doctors-component')
            ->with([
                'specialities' => $this->specialities,
                'doctors' => $this->doctors
            ]);
    }
}
