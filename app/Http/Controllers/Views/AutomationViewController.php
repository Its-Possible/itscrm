<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutomationViewController extends Controller
{
    //
    public function index()
    {
        return view('pages.automations.index');
    }
}
