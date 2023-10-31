<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TagsComponent extends Component
{
    public $tag;
    public $new_tag;
    public $customer;
    public bool $editable = false;

    public function addOrCreate(): void
    {
        $tag = Tag::where('name', $this->new_tag);

        if($tag->count() <= 0){
            $tag->name = $this->new_tag;
            $tag->create();
        }else{
            $tag = $tag->first();
        }

        dd($tag->toArray());
    }

    public function edit(): void
    {
        $this->editable = true;
    }

    public function delete(int $tag_id): void
    {
        Tag::find($tag_id)->delete();
    }

    public function mount(int $customer): void
    {
        $this->customer = Customer::with('tags')->find($customer);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.backoffice.components.customers.tags-component');
    }
}
