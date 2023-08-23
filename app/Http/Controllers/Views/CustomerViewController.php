<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerViewController extends Controller
{

    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.customers.index');
    }

    /**<
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.customers.create');
    }

    public function import()
    {
        return view('pages.customers.import');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): Response
    {
        //
        dd($slug);

        return response()->json([
            "message" => "Editing...",
            "slug" => $slug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug): Response
    {
        //
        dd($slug);

        return response()->json([
            "message" => "Editing...",
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
