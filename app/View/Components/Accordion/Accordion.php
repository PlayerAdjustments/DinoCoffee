<?php

namespace App\View\Components\Accordion;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Accordion extends Component
{
    public $id;
    public bool $collapse;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $collapse)
    {
        $this->id = 'accordion-'.trim($id);
        $this->collapse = $collapse;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accordion.accordion');
    }
}
