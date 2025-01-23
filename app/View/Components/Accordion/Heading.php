<?php

namespace App\View\Components\Accordion;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    public $id;
    public $target;
    public $text;
    public $icon;
    public $viewbox;
    public bool $arrow;
    public bool $positionFirst;
    public bool $positionLast;
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $target, $text, $options, $icon = null)
    {
        $this->id = 'accordion-open-heading-'.trim($id);
        $this->target = 'accordion-open-body-'.trim($target);
        $this->text = trim($text ?? '');
        $this->icon = $icon;
        $this->viewbox = $options['viewbox'] ?? null;
        $this->arrow = $options['arrow'] ?? false;
        $this->positionFirst = $options['positionFirst'] ?? false;
        $this->positionLast = $options['positionLast'] ?? false;
        
        $this->class = $this->positionFirst ? 'rounded-t-xl' : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.accordion.heading');
    }
}
