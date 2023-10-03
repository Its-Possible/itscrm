<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\User;
use Livewire\Component;

class AppUsersComponent extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $usersCount = User::count();
        $users = User::with('avatar')->paginate(30);

        return view('livewire.backoffice.app-users-component')
            ->with([
                'users' => $users,
                'users_counter' => $usersCount
            ]);
    }
}
