<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialityStoreRequest;
use App\Http\Requests\SpecialityUpdateRequest;
use App\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class SpecialityApiController extends Controller
{
    //
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:200'
        ]);

        if (!$validated) {
            $request->session()->flash('its.message.body', 'Por favor, verifique todos os campos introduzidos!');
            return back()->withInput()->withErrors($validated);
        }

        $speciality = new Speciality();
        $speciality->name = $request->input('name');
        $speciality->description = $request->input('description');
        $speciality->slug = Str::slug($speciality->name . microtime());

        if(!$speciality->save()){
            $request->session()->flash('its.message.body', 'Não foi possível criar a especialidade, tente novamente!');
            return back()->withInput()->withErrors($validated);
        }


        $request->session()->flash('its.message.body', 'Especialidade criada com sucesso!');

        return redirect()->route('its.app.specialities.index');
    }

    public function update(Request $request, string $slug)
    {

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:3|max:200'
        ]);

        if (!$validated) {
            return back()->withInput()->withErrors($request);
        }

        $speciality = Speciality::where('slug', $slug)->firstOrFail();
        $speciality->name = $request->input('name');
        $speciality->description = $request->input('description');

        if (!$speciality->save()) {
            return back()->withInput()->withErrors(['message' => 'Não foi possivel atualizar a especialidade!']);
        }

        return redirect()->route('its.app.specialities.index')->withErrors(['message' => 'Especialidade atualizada com sucesso!']);
    }
}
