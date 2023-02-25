<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class PageStaticViewController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home()
    {

        return view('pages.home');
    }
}
