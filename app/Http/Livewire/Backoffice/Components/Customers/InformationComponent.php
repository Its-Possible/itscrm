<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InformationComponent extends Component
{

    public $customer;

    public function mount(string $customer = null): void
    {
        if(!is_null($this->customer)) {
            $this->customer = Customer::where('slug', $customer)->firstOrFail();
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.backoffice.components.customers.information-component');
    }
}
