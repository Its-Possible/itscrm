<?php

namespace App\Livewire\Backoffice\Components\Customers;

use App\Models\Customer;
use App\Models\Specialty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DoctorsComponent extends Component
{
    public $customer;
    public $doctors = [];
    public $specialties = [];

    public $selected = "";

    public function updateDoctorsFromSpeciality(): void
    {
        $specialty = Specialty::with('doctors')->where('slug', $this->selected)->firstOrFail();
        $this->doctors = $specialty->doctors;
    }

    public function mount(string $customer = null): void
    {
        if(!is_null($customer)){
            $this->customer = Customer::where('slug', $customer)->firstOrFail();
        }
    }

    public function addSpecialityAndDoctorToCustomer(): void
    {
        // TODO: Add speciality and doctor to customer on database
        dd(request()->all());
    }

    public function save(): void
    {
        dd("hello world, save speciality and doctor information");
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $this->specialties = Specialty::all();

        return view('livewire.backoffice.components.customers.doctors-component')
            ->with([
                'specialties' => $this->specialties,
                'doctors' => $this->doctors
            ]);
    }
}
