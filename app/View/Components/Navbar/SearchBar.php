<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $functional)
    {
        //
    }

    /**
     * Wheter the component shoud be rendered.
     */
    public function shouldRender()
    {
        return $this->functional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.search-bar');
    }
}
