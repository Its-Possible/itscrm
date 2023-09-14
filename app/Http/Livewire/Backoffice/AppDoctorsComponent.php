<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Doctor;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppDoctorsComponent extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $doctorsCount = Doctor::count();
        $doctors = Doctor::with('user')
            ->with('tags')
            ->paginate(30);

        return view('livewire.backoffice.app-doctors-component')
            ->with([
                'doctors' => $doctors,
                'doctors_counter' => $doctorsCount,
                'modal' => $this->modal
            ]);
    }
}
