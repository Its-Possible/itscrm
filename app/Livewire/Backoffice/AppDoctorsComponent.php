<?php

namespace App\Livewire\Backoffice;

use App\Models\Doctor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppDoctorsComponent extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render(): View|Factory|Application
    {

        $doctors_counter = Doctor::count();
        $doctors  = Doctor::with(['user', 'specialities'])->paginate(30);

        return view('livewire.backoffice.app-doctors-component')->with(['doctors_counter' => $doctors_counter, 'doctors' => $doctors]);
    }
}
