<?php

namespace App\Http\Controllers\Api;

use App\Models\Specialty;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorStoreRequest;

class DoctorApiController extends Controller
{
    //
    public function store(DoctorStoreRequest $request)
    {
        if(!$validated = $request->validated()){
            $request->session()->flash('message.body', "Por favor verifique todos os campos introduzidos");
            return back()->withInput()->withErrors($validated);
        }

        $user = User::where('username', $request->input('username'))->firstOrFail();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->email = $request->input('email');
        $doctor->mobile = $request->input('mobile');

        $specialties = json_decode($request->input('doctor-specialties'), true);

        if(!$doctor->save()){
            return back()->withInput()->withErrors($validated);
        }

        if(count($specialties)){
            $specialities = [];
            foreach($specialties as $slug => $name){
                $specialty = Specialty::where('slug', $slug)->first();
                $specialties[] = $specialty->id;
            }
            $doctor->specialties()->attach($specialties);
        }

        $request->session()->flash('message.type', 'success');
        $request->session()->flash('message.body', 'O médico foi criado com sucesso!');

        return redirect()->route('app.doctors');
    }
}
