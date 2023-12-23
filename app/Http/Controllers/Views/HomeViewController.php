<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeViewController extends Controller
{
    //
    public function index(Request $request): View|Factory|Application
    {
        return view('pages.home');
    }
}
