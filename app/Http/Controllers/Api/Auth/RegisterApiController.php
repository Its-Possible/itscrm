<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterApiController extends Controller
{
    //
    public function show(Request $request)
    {
        return view('auth.register');
    }
}
