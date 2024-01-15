<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInViewController extends Controller
{
    //
    public function login()
    {
        return view('pages.auth.sign-in');
    }
}
