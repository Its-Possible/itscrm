<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialityStoreRequest;
use App\Http\Requests\SpecialityUpdateRequest;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialtyApiController extends Controller
{
    //
    public function store(SpecialityStoreRequest $request)
    {
        if (!$validated = $request->validated()) {
            $request->session()->flash('message.body', 'Por favor, verifique todos os campos introduzidos!');
            return back()->withInput()->withErrors($validated);
        }

        $speciality = new Specialty();
        $speciality->name = $request->input('name');
        $speciality->description = $request->input('description');
        $speciality->slug = Str::slug($speciality->name . microtime());

        if (!$speciality->save()) {
            $request->session()->flash('message.body', 'Não foi possível criar a especialidade, tente novamente!');
            return back()->withInput()->withErrors($validated);
        }

        $request->session()->flash('message.body', 'Especialidade criada com sucesso!');

        return redirect()->route('app.specialties');
    }

    public function update(SpecialityUpdateRequest $request, $slug)
    {
        if (!$validated = $request->validated()) {
            $request->session()->flash('message.body', 'Por favor, verifique todos os campos introduzidos!');
            return back()->withInput()->withErrors($validated);
        }

        $speciality = Specialty::where('slug', $slug)->firstOrFail();
        $speciality->name = $request->input('name');
        $speciality->description = $request->input('description');

        if(!$speciality->save()){
            $request->session()->flash('message.body', 'Não foi possível criar a especialidade, tente novamente!');
            return back()->withInput()->withErrors($validated);
        }

        $request->session()->flash('message.body', "Especialidade atualizada com sucesso");

        return redirect()->route('app.specialties.edit', $speciality->slug);
    }
}
