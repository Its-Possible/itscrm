<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginViewController extends Controller
{
    //
    public function login(Request $request): Factory|View|Application
    {
        return view('auth.login');
    }
}
