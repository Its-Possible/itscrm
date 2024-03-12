<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;

class TaskViewController extends Controller
{
    //
    public function index()
    {
        return view('pages.tasks.index');
    }

    public function create()
    {
        return view('pages.tasks.create');
    }

    public function show()
    {
        return view('pages.tasks.show');
    }
}
