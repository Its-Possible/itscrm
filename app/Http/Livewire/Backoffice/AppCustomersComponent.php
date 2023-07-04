<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Customer;
use Livewire\Component;

class AppCustomersComponent extends Component
{

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $customers_count = Customer::count();

        return view('livewire.backoffice.app-customers-component')
            ->with([
                'customers' => Customer::where('name', 'like', '%' . $this->search . '%')->paginate(30),
                'customers_counter' => $customers_count
            ]);
    }
}
