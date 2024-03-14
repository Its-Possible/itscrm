<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DoctorViewController extends Controller
{
    //
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.doctors.index');
    }

    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        return view('pages.doctors.create');
    }

    public function show(Request $request, $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.doctors.show', ['slug' => $slug]);
    }

    public function edit(Request $request, $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('pages.doctors.edit', ['slug' => $slug]);
    }
}
