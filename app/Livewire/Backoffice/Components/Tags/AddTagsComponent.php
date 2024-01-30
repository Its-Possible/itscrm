<?php

namespace App\Livewire\Backoffice\Components\Tags;

use App\Models\Campaign;
use App\Models\Customer;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddTagsComponent extends Component
{
    public $customer;
    public string $value;
    public Collection $tags;
    public Collection|null $suggestions;

    protected TagRepository $tagRepository;

    public function __construct($id = null)
    {
        $this->tagRepository = new TagRepository();
    }

    public function mount($customer = null): void
    {
        if(!is_null($customer)) {
            $this->customer = Customer::with('tags')->where('slug', $customer)->first();
        }
    }

    /**
     * Search tags by name using input value
     *
     * @return void
     */
    public function search(): void
    {
        if($this->value) {
            $this->suggestions = $this->tagRepository->searchByNameWhereDoesntHaveCustomer($this->customer->id, $this->value);
        }else{
            $this->suggestions = null;
        }
    }

    public function addOrCreate(string $slug = null): void
    {
        // TODO: Create relationship if not exists tag, create a tag and create relationship
        if(!is_null($slug)) {
            $this->customer->tags()->attach(Tag::where('slug', $slug)->first()->id);
        }else{

            $this->customer->tags()->create([
                'name' => $this->value,
                'slug' => uniqid()
            ]);

            $this->value = "";
        }
    }

    public function findAndRemove($selected): void
    {
        // TODO: Resolve "Attempt to read property "tags" on null
        @$this->customer->tags()->detach($selected);
        $this->tags = $this->customer->tags;
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        // TODO: Resolve "Attempt to read property "tags" on null
        $this->tags = Tag::all();
//        $this->tags = $this->customer->tags;

        return view('livewire.backoffice.components.customers.tags-component')
            ->with(['campaigns' => Campaign::all()]);
    }
}
