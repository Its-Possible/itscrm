<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
