<?php

namespace App\Http\Livewire\Backoffice\Components\Customers;

use App\Models\Campaign;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class TagsComponent extends Component
{

    public $customer;
    public string $tag;
    public Collection $tags;
    public Collection $suggestions;

    /**
     * Search tag from input value
     *
     * @return void
     */
    public function searchTag(): void
    {
        $this->suggestions = Tag::all();
    }

    public function addTag(): void
    {
        $tag = Tag::where('name', $this->tag);

        if($tag->count() > 0){
            dd("Já existe essa tag basta associar");
        }else {
            $tag = new Tag;
            $tag->name = $this->tag;
            $tag->slug = Str::slug($this->tag);
            $tag->save();
        }

        $this->tag = "";
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
        $this->tags = Tag::all();

        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
