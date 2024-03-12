<?php

namespace App\Livewire\Backoffice\Components\Doctors;

use App\Helpers\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InformationComponent extends Component
{
    protected User $user;
    public string $username;
    public string $email;

    public function changeSelectUsername(): void
    {

        $this->user = User::with('doctor')->where('username', $this->username)->first();

        if (is_null($this->user->doctor)) {
            $this->dispatch('user-selected', user: $this->user);
        }
    }

    public function emailChangeEventHandler(): void
    {
        $user = User::where('email', $this->email)->count();

        if ($user > 0) {
            $this->dispatch('email-unique-error', email: $this->email);
        }
    }


    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $users = User::where('status', UserInterface::STATUS_ACTIVE)
            ->whereDoesntHave('doctor')
            ->get();

        return view('livewire.backoffice.components.doctors.information-component')->with(['users' => $users]);
    }
}
