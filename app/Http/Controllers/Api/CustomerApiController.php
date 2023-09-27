<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Str;

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
        $customer->name = encrypt_data($request->input('name'));
        $customer->email = encrypt_data($request->input('email'));
        $customer->birthday = $request->input('birthday');
        $customer->address_line_1 = encrypt_data($request->input('address-line-1'));
        $customer->address_line_2 = encrypt_data($request->input('address-line-2'));
        $customer->postcode = encrypt_data($request->input('postcode'));
        $customer->location = encrypt_data($request->input('location'));
        $customer->mobile = $request->input('mobile');
        $customer->slug = Str::slug(str_replace("-", "", microtime()));

        if(!$customer->save()){
            return back()->withErrors($request)->withInput();
        }

        $request->session()->flash('its.message.body', 'Cliente criado com sucesso!');

        return redirect()->route('its.app.customers.index');
    }

    public function update(Request $request, int $id)
    {
        return $id;
    }
}
