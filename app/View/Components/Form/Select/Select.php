<?php

namespace App\View\Components\Form\Select;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public string $id;
    public string $name;
    public string $label;
    public array $options;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $label, $options = [])
    {
        $this->id = 'select-'.trim(strtolower($id));
        $this->name = $name;
        $this->label = $label;
        $this->options = array_merge([
            'placeholder' => 'Select a(n) '.trim(strtolower($label)),
            
            // This section can hold conditions like Auth::user()->trashed()
            'required' => true,
            'readonly' => false,
            'disabled' => false
        ], $options);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select.select');
    }
}
