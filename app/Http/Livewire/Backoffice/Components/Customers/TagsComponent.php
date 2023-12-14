<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Customer;
use App\Models\Tag;
use App\Models\Campaign;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class TagsComponent extends Component
{

    public $customer;
    public string $value;
    public Collection $tags;
    public Collection|null $suggestions;


    public function mount($customer = null): void
    {
        if(!is_null($customer)) {
            $this->customer = Customer::with('tags')->where('slug', $customer)->first();
        }
    }

    /**
     * Search tag from input value
     *
     * @return void
     */
    public function search(): void
    {
        $this->suggestions = Tag::where('name', 'like', $this->value ."%")
            ->limit(8)
            ->get();
    }

    public function addOrCreate(string $slug = null): void
    {
        // TODO: Create relationship if not exists tag, create a tag and create relationship
        if(!is_null($slug)) {
            // Select element to add tag
            DB::table('tag_customer')->insert([
                'tag_id' => Tag::where('slug', $slug)->first()->id,
                'customer_id' => $this->customer->id
            ]);

        }else{

            $this->customer->tags()->create([
                'name' => $this->value,
                'slug' => Str::slug($this->value) . uniqid()
            ]);

            $this->value = "";
        }
    }

    public function findAndRemove($selected): void
    {
        if(!is_null($this->customer)){
            $this->customer->tags->detach($selected);
        }
    }

    public function render(): Application|View|Factory
    {
        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
