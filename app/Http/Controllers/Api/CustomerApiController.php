<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->json([
            'data' => Customer::with('tags')->get()
        ]);
    }

    public function update(Request $request, int $id)
    {
        return $id;
    }
}
