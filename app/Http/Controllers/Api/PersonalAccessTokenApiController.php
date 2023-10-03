<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalAccessTokenApiController extends Controller
{
    //
    public function store(Request $request)
    {
        $token = $request->user()->createToken('dev', ['web:admin']);

        return response()->json([
            'username' => $request->user()->username,
            'email' => $request->user()->email,
            'token' => $token->plainTextToken
        ]);
    }
}
