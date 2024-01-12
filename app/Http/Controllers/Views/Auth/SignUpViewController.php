<?php

namespace App\Http\Controllers\Views\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laminas\Diactoros\Response\JsonResponse;

class SignUpViewController extends Controller
{
    //
    public function register()
    {
        return view('pages.auth.sign-up');
    }
}
