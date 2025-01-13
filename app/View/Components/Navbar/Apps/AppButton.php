<?php

namespace App\View\Components\Navbar\Apps;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected bool $functional = false)
    {
        //
    }

    /**
     * Whether the component should be rendered.
     */
    public function shouldRender() : bool
    {
        return $this->functional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.apps.app-button');
    }
}
