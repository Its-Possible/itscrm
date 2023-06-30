<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
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

    public function marketing()
    {
        return view('pages.marketing.home');
    }

}
