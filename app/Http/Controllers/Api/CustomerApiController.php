<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->json([
            'data' => Customer::with('tags')->limit(5)->get()
        ]);
    }

    public function store(CustomerStoreRequest $request)
    {
        if(!$request->validated()){
            return back()->withErrors($request)->withInput();
        }

        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->birthday = $request->input('birthday');
        $customer->address_line_1 = $request->input('address_line_1');
        $customer->address_line_2 = $request->input('address_line_2');
        $customer->postcode = $request->input('postcode');
        $customer->location = $request->input('location');
        $customer->mobile = $request->input('mobile');
    }

    public function update(Request $request, int $id)
    {
        return $id;
    }
}
