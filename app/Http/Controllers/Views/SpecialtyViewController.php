<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SpecialtyViewController extends Controller
{
    //
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.specialties.index');
    }

    public function create(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.specialties.create');
    }

    public function edit(Request $request, $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $speciality = Specialty::where('slug', $slug)->firstOrFail();

    return view('pages.specialties.edit')->with([
                'speciality' => $speciality
        ]);
    }
}
