<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorApiController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email|min:3|max:150|unique:doctors',
            'mobile' => 'required|integer'
        ]);

        if(!$validated){
            return back()->withInput()->withErrors($validated);
        }

        $user = User::where('username', $request->input('username'))->firstOrFail();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->email = $request->input('email');
        $doctor->mobile = $request->input('mobile');

        if(!$doctor->save())
        {
            return back()->withInput()->withErrors($validated);
        }

        $request->session()->flash('its.message.type', 'success');
        $request->session()->flash('its.message.body', 'O médico foi criado com sucesso!');

        return redirect()->route('its.app.doctors.index');

    }
}
