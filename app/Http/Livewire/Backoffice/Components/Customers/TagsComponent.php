<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Campaign;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TagsComponent extends Component
{

    public string $tag = "";

    public function render(): Application|View|Factory
    {

        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
