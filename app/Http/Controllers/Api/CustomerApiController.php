<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerPatchRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerApiController extends Controller
{
    //
    public function list(Request $request): JsonResponse
    {
        $customers = Customer::with('tags')
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
        $customer = Customer::with('tags')
            ->where('slug', $slug)
            ->firstOrFail();

        return response()
            ->json([
                'status' => 200,
                'customer' => $customer
            ], 200);
    }

    public function store(CustomerStoreRequest $request): JsonResponse
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->country = $request->input('country');
        $customer->zip = $request->input('zip');
        $customer->website = $request->input('website');
        $customer->vat = $request->input('vat');
        $customer->slug = Str::slug(uniqid());

        if(!$customer->save()){
            return response()
                ->json([
                    "status" => 500,
                    "message" => "Customer create error, try again, please!"
                ], 500);
        }

        return response()
            ->json([
                "status" => 201,
                "message" => "Customer created with success!",
                "customer" => $customer
            ], 201);
    }

    public function patch(CustomerPatchRequest $request, $slug): JsonResponse
    {
        $customer = Customer::where('slug', $slug)->firstOrFail();

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->state = $request->input('state');
        $customer->country = $request->input('country');
        $customer->zip = $request->input('zip');
        $customer->website = $request->input('website');
        $customer->vat = $request->input('vat');
        $customer->slug = Str::slug(uniqid());

        if(!$customer->save()){
            return response()
                ->json([
                    "status" => 500,
                    "message" => "Ocorreu um erro, tente novamente mais tarde"
                ], 500);
        }

        return response()
            ->json([
                "status" => 201,
                "message" => "Cliente criado com sucesso",
                "customer" => $customer
            ], 201);

    }
}
