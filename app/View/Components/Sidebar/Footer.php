<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $functional = false)
    {
        $this->functional = $functional;
    }

    /**
     * Wether the component should be rendered.
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
        return view('components.sidebar.footer');
    }
}
