<?php

namespace App\Livewire\Backoffice\Components\Doctors;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SpecialtiesComponent extends Component
{
    protected $listeners = ["doctor-selected" => "doctorSelectedEvent"];

    public User $user;
    public mixed $doctor;
    public mixed $specialties;
    public mixed $selected = "none";
    public array $specialtiesListSelected;

    public function specialtyAddEvent(): void
    {
        $specialty = Specialty::where('slug', $this->selected)->firstOrFail();
        if(!array_key_exists($specialty->slug, $this->specialtiesListSelected)) {
            $this->specialtiesListSelected = array_merge($this->specialtiesListSelected, array($specialty->slug => $specialty->name));
        }

        $this->specialties = $this->specialties->reject(function ($item) use ($specialty) {
            return $item->slug === $specialty->slug;
        });

        $this->selected = "none";
        $this->dispatch('refresh');
    }

    public function specialtyRemoveEvent(string $key): void
    {
        if(array_key_exists($key, $this->specialtiesListSelected)){
            unset($this->specialtiesListSelected[$key]);
        }
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $this->specialties = Specialty::all();

        return view('livewire.backoffice.components.doctors.specialties-component');
    }
}
