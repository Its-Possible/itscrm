<?php

namespace App\Http\Livewire\Backoffice\Components\Doctors;

use App\Helpers\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InformationComponent extends Component
{
    public string $username;

    public function changeSelectUsername(): void
    {
        $this->emit('doctorSelectedUsername', $this->username);
    }

    public function render(): Factory|View|Application
    {

        $users = User::where('status', UserInterface::STATUS_ACTIVE)->get();

        return view('livewire.backoffice.components.doctors.information-component')
            ->with([
                'users' => $users
            ]);
    }
}
