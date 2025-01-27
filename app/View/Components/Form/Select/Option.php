<?php

namespace App\View\Components\Form\Select;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Option extends Component
{
    public $value;
    public $text;
    public $parent; //? Parent refers to the name of the select.
    /**
     * Create a new component instance.
     */
    public function __construct($value, $text, $parent)
    {
        $this->value = $value;
        $this->text = $text;
        $this->parent = $parent;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select.option');
    }
}
