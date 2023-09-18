<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialityStoreRequest;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityApiController extends Controller
{
    //
    public function store(SpecialityStoreRequest $request)
    {
        if (!$request->validated()) {
            dd("hello world");
            return back()->withInput()->withErrors($request);
        }

        $speciality = new Speciality();
        $speciality->name = $request->input('especiality-name');
        $speciality->description = $request->input('especiality-description');

        if (!$speciality->save()) {
            return back()->withInput()->withErrors(['message' => 'Não foi possivel criar a especialidade!']);
        }

        return redirect()->route('its.app.specialities.index')->withErrors(['message' => 'Especialidade criada com sucesso!']);
    }
}
