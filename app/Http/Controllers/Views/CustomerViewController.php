<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerViewController extends Controller
{
    //
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(): View|Factory|Application
    {
        return view('pages.customers.index');
    }

    public function create(): View|Factory|Application
    {
        return view('pages.customers.create');
    }

    public function show(string $slug)
    {
        $customer = Customer::with('tags')->where('slug', $slug)->firstOrFail();

        return view('pages.customers.show')
            ->withCustomer($customer);
    }

    public function edit(string $slug)
    {
        $customer = Customer::with('tags')->where('slug', $slug)->firstOrFail();

        return view('pages.customers.edit')
            ->withCustomer($customer);
    }
}
