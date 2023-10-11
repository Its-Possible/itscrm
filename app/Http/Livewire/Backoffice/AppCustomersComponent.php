<?php

namespace App\Http\Livewire\Backoffice;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppCustomersComponent extends Component
{
    use WithFileUploads;

    public $search;
    public $modal = false;

    public $files;

    protected $queryString = ['search'];

    public function save()
    {
        $this->validate([
            'files.*' => 'file|max:6144'
        ]);

        if(is_array($this->files)) {
            foreach ($this->files as $file) {
                $file->store('files');
            }
        }else{
            $this->files->store('files');
        }
    }

    public function delete(string $slug)
    {
        $customer = Customer::with(['specialities', 'doctors'])->where('slug', $slug)->firstOrFail();

        $customer->specialities();

        dd($customer);
    }

    public function render()
    {
        $customersCount = Customer::count();
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->with('tags')
            ->paginate(30);

        return view('livewire.backoffice.app-customers-component')
            ->with([
                'customers' => $customers,
                'customers_counter' => $customersCount,
                'modal' => $this->modal
            ]);
    }
}

