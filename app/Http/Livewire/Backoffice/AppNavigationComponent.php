<?php

namespace App\Http\Livewire\Backoffice;

use Livewire\Component;

class AppNavigationComponent extends Component
{

    public $page = "alerts";

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.backoffice.app-navigation-component');
    }
}
