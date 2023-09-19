<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityViewController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('pages.specialities.index');
    }

    public function create(Request $request)
    {
        return view('pages.specialities.create');
    }

    public function edit(Request $request, string $slug)
    {
        $speciality = Speciality::where('slug', $slug)->firstOrFail();

        return view('pages.specialities.edit')
            ->with([
                'speciality' => $speciality
            ]);
    }
}
