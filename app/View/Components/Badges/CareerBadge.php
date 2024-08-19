<?php

namespace App\View\Components\Badges;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CareerBadge extends Component
{
    public $type;
    public $color;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $color)
    {
        $this->type = $type;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badges.careerbadge');
    }
}
