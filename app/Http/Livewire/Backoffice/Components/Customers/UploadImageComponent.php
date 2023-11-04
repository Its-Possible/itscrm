<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Avatar;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UploadImageComponent extends Component
{

    public $avatar = null;
    public $customer;

    public function mount(string $customer = null): void
    {
        if(!is_null($customer)) {
            $this->customer = Customer::where('slug', $customer)->firstOrFail();
            $this->avatar = $this->customer->avatar;
        }

        if(is_null($this->avatar)) {
            $this->avatar = Avatar::first();
        }
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.backoffice.components.customers.upload-image-component');
    }
}
