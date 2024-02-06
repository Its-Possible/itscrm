<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialityViewController extends Controller
{
    //
    public function index()
    {
        return view('pages.specialities.index');
    }

    public function show(Request $request, $slug)
    {
        return "hello world";
    }

    public function create(Request $request)
    {
        return view('pages.specialities.create');
    }
}
