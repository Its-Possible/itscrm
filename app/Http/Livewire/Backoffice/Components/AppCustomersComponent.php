<?php

namespace App\Http\Livewire\Backoffice\Components;

use App\Models\Customer;
use Livewire\Component;

class AppCustomersComponent extends Component
{
    public $customers = 0;
    public function render()
    {

        $this->customers = Customer::count();

        return view('livewire.backoffice.components.customers-component')
            ->with([
                'customers' => $this->customers
            ]);
    }
}
