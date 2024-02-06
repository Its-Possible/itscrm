<?php

namespace App\Livewire\Backoffice;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppCustomersComponent extends Component
{
    use WithFileUploads;

    public $search;
    public $modal = false;
    public $customer;

    public $files;

    protected $queryString = ['search'];

    public function save(): void
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

    public function delete(string $slug): void
    {
        $customer = Customer::with(['Specialities', 'doctors'])->where('slug', $slug)->firstOrFail();

        if($customer->specialities->count() > 0) {
            $customer->specialities->delete();
        }

        if($customer->doctors->count() > 0) {
            $customer->doctors->delete();
        }

        $customer->delete();

        $this->emit('refresh');
    }

    public function render()
    {
        $customersCount = Customer::count();
        $customers = Customer::with('tags')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(30);

        return view('livewire.backoffice.app-customers-component')
            ->with([
                'customers' => $customers,
                'customers_counter' => $customersCount,
                'modal' => $this->modal
            ]);
    }
}
