<?php

namespace App\Http\Livewire\Backoffice\Components;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppCustomersComponent extends Component
{
    public $customers = 0;

    public function render(): Factory|View|Application
    {

        $this->customers = Customer::count();

        return view('livewire.backoffice.components.customers-component')
            ->with([
                'customers' => $this->customers
            ]);
    }
}