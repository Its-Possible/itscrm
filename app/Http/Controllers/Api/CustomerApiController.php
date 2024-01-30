<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerPatchRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Mail\CampaignCustomizedMail;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerApiController extends Controller
{
    //
    public function list(Request $request): JsonResponse
    {
        $customers = Customer::with(['avatar', 'tags', 'tags.campaigns'])
            ->paginate(30);

        return response()
            ->json([
                'status' => 201,
                'message' => "Lista de todos os clientes",
                'customers' => $customers
            ], 201);
    }

    public function show(Request $request, string $slug): JsonResponse
    {
        $customer = Customer::with(['avatar', 'tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()
            ->json([
                'status' => 200,
                'customer' => $customer
            ], 200);
    }

    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        if(!$request->validated()){
            return back()->withErrors($request)->withInput();
        }

        $customer = new Customer;

        if($request->input('avatar')) {
            $customer->avatar_id = $request->input('avatar');
        }

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

        if($request->input('speciality-select')) {
            $customer->specialities()->attach([
                ['speciality_id' => Speciality::where('slug', $request->input('speciality-select'))->firstOrFail()->id]
            ]);
        }

        if($request->input('doctor-select')) {
            $customer->doctors()->attach([
                ['doctor_id' => Doctor::findOrFail($request->input('doctor->select'))->id]
            ]);
        }

        $request->session()->flash('its.message.body', 'Cliente criado com sucesso!');

        return redirect()->route('its.app.customers.index');
    }

    /**
     *
     *
     * @param CustomerStoreRequest $request
     * @return JsonResponse
     */
    public function requestStore(CustomerStoreRequest $request): JsonResponse
    {
        return response()->status(201)->json();
    }

    public function requestPatch(CustomerUpdateRequest $request): JsonResponse
    {
        return response()->status(201)->json();
    }
}
