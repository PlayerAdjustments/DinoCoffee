<?php

namespace App\View\Components\Accordion;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Body extends Component
{
    public $id;
    public $parent;
    public bool $positionLast;
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $parent, $positionLast = false)
    {
        $this->id = 'accordion-open-body-'.trim($id);
        $this->parent = 'accordion-open-heading-'.trim($parent);
        $this->positionLast = $positionLast;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accordion.body');
    }
}
