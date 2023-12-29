<?php

namespace App\Http\Controllers\Api\Settings\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccessTokenStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccessTokenApiController extends Controller
{
    //
    public function store(AccessTokenStoreRequest $request)
    {
        $user = User::where('username', $request->input('username'))
            ->where('email', $request->input('email'))
            ->first();

        if (!$user or !Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        return response()->json([
            'device_name' => $request->input('device-name'),
            'access-token' => $user->createToken($request->input('device-name'))->plainTextToken
        ]);
    }
}
