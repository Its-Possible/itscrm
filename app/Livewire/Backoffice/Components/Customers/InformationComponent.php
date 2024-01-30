<?php

namespace App\Livewire\Backoffice\Components\Customers;

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

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.backoffice.components.customers.information-component');
    }
}
