<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;

    /**
     * Create a new component instance.
     */
    public function __construct($action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = strtoupper($method);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form');
    }
}
