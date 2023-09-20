<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $doctorFromSpecialities = json_decode($request->input('doctor-specialities'), true);

        if(!$doctor->save())
        {
            return back()->withInput()->withErrors($validated);
        }

        if(count($doctorFromSpecialities)) {
            $specialities = [];

            foreach($doctorFromSpecialities as $speciality_slug => $speciality_name) {
                $speciality = Speciality::where('slug', $speciality_slug)->first();
                $specialities[] = $speciality->id;
            }

            $doctor->specialities()->attach($specialities);
        }

        $request->session()->flash('its.message.type', 'success');
        $request->session()->flash('its.message.body', 'O médico foi criado com sucesso!');

        return redirect()->route('its.app.doctors.index');

    }
}
