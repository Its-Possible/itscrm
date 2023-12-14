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

    /**
     * Search tag from input value
     *
     * @return void
     */
    public function searchTag(): void
    {
        $this->suggestions = Tag::where('name', 'like', $this->value ."%")
            ->limit(8)
            ->get();
    }

    /**
     * @param string|null $slug
     * @return void
     */
    public function addTag(string $slug = null): void
    {
        // TODO: Create relationship if not exists tag, create a tag and create relationship
        if(!is_null($slug)) {
            $tag = Tag::where('slug', $slug)->first();
            $customer = Customer::where('slug', $this->customer)->first();

            DB::table('tag_customer')->insert([
                'tag_id' => $tag->id,
                'customer_id' => Str::slug($customer->id)
            ]);
        }else{

            $customer = Customer::where('slug', $this->customer)->first();

            $customer->tags()->create([
                'name' => $this->value,
                'slug' => Str::slug($this->value)
            ]);

            $this->value = "";
        }
    }

    public function removeTag($selected): void
    {
        $tag = Tag::where('name', $selected);

        if($tag->count() > 0){
            $tag->delete();
        }
    }

    public function mount($customer = null)
    {
        if(!is_null($customer)){
            $this->tags = Customer::with('tags')->where('slug', $customer)->first()->tags;
        }
    }

    public function render(): Application|View|Factory
    {
        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
