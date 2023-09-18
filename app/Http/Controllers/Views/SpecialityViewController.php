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
}
