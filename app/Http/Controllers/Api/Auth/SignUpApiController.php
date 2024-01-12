<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignUpApiController extends Controller
{
    //
    public function register()
    {
        return response()->json("Neste momento o registo de novos utilizadores está ativo");
    }
}
