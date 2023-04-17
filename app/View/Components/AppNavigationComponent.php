<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppNavigationComponent extends Component
{

    private string $page;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->page = 'home';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.navigation')
            ->with('page', $this->page);
    }
}
