<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $value;
    public $type;
    public $placeholder;
    public $helper;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $label, $value, $type = 'text', $placeholder = null, $helper = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->placeholder = $placeholder ?? 'Enter your ' . strtolower($label);
        $this->helper = $helper;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
