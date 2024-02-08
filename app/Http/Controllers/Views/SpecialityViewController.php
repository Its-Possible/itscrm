<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SpecialityViewController extends Controller
{
    //
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.specialities.index');
    }

    public function create(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.specialities.create');
    }

    public function edit(Request $request, $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();

    return view('pages.specialities.edit')->with([
                'speciality' => $speciality
        ]);
    }
}
