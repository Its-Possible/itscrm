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

        $user = User::with('doctor')->where('username', $this->username)->first();

        if($user->doctor->count() <= 0) {
            $this->emit('doctorSelectedUsername', $this->username);
        }
    }

    public function render(): Factory|View|Application
    {

        $users = User::where('status', UserInterface::STATUS_ACTIVE)
            ->whereDoesntHave('doctor')
            ->get();

        return view('livewire.backoffice.components.doctors.information-component')
            ->with([
                'users' => $users
            ]);
    }
}
