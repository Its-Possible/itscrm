<?php

namespace App\Livewire\Backoffice\Components\Doctors;

use App\Models\Speciality;
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
    public mixed $specialties;
    public mixed $selected = "none";

    public function doctorSelectedEvent(string $username): void
    {
        $this->user = User::with('specialties')->where('username', $username)->firstOrFail();
    }

    public function render()
    {
        return "hello world";
    }
}
