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
    public $icon;
    public $options;
    /**
     * Create a new component instance.
     */
    public function __construct($name,
    $label,
    $value = null,
    $type = 'text',
    $icon = null,
    array $options = []
    )
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->type = $type;
        $this->icon = $icon;
        $this->options = array_merge([
            'placeholder' => 'Enter your '.strtolower($label),
            'helper' => null,
            'viewbox' => null,
            'datepicker' => false,
            'regex' => null,
            // This section could be a condition like Auth::user()->isAdmin()
            'required' => true,
            'readonly' => false,
            'disabled' => false,
        ], $options);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
