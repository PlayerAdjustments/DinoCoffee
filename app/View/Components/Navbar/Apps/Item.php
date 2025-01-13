<?php

namespace App\View\Components\Navbar\Apps;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $appname="default app name", public string $route="dashboard.main", public bool $functional = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.apps.item');
    }
}
