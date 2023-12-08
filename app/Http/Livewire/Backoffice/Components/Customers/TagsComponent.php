<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Tag;
use App\Models\Campaign;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
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

            dd($tag);
        }else{

            dd($this->customer);

            $tag = new Tag();
            $tag->name = $this->value;
            $tag->slug = Str::slug($this->value);
            $tag->save();

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

    public function render(): Application|View|Factory
    {
        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
