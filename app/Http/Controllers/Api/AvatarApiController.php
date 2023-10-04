<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarStoreRequest;
use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarApiController extends Controller
{
    //
    public function store(AvatarStoreRequest $request)
    {
        if(!$request->validated()) {
            return response()->json([
               'message' => 'Error: Validation error'
            ]);
        }

        $avatar = new Avatar();
        $avatar->image = $request->input('image');

        if(!$avatar->save()){
            return response()->json([
               'message' => 'Error: Save image'
            ]);
        }

        return response()->json([
           'message' => 'Saved image on database'
        ]);
    }
}
