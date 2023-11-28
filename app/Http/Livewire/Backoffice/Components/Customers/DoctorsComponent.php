<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DoctorsComponent extends Component
{
    public $customer;
    public $doctors = [];
    public $specialities = [];

    public $selected = "";

    public function updateDoctorsFromSpeciality(): void
    {
        $speciality = Speciality::with('doctors')->where('slug', $this->selected)->firstOrFail();
        $this->doctors = $speciality->doctors;
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
        dd($request);
    }

    public function save(): void
    {
        dd("hello world, save speciality and doctor information");
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
