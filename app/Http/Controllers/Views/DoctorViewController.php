<?php

namespace App\Http\Controllers\Views;

use App\Helpers\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorViewController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('pages.doctors.index');
    }

    public function create(Request $request)
    {
        $users = User::where('status', UserInterface::STATUS_ACTIVE)->get();
        $specialities = Speciality::all();

        return view('pages.doctors.create')
            ->with([
                'users' => $users,
                'specialities' => $specialities
            ]);
    }

    public function edit(Request $request, string $username)
    {
        $user = User::with('specialities')
            ->where('username', $username)
            ->where('status', UserInterface::STATUS_ACTIVE);

        return view('pages.doctors.edit')
            ->with([
                'user' => $user
            ]);
    }
}
