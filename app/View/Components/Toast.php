<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $class;
    public $icon;
    public $randomId;
    /**
     * Create a new component instance.
     */
    public function __construct($type='Info',  $icon=null)
    {
        if($icon == null) $icon=$type;

        switch ($type){
            case 'Success':
                $class = 'text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200';
                break;
            case 'Error':
                $class = 'text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200';
                break;
            case 'Warning':
                $class = 'text-orange-500 bg-orange-100 dark:bg-orange-700 dark:text-orange-200';
                break;
            case 'Info':
                $class = 'text-blue-500 bg-blue-100 dark:bg-blue-700 dark:text-blue-200';
                break;
            default:
                $class = 'text-purple-500 bg-purple-100 dark:bg-purple-700 dark:text-purple-200';
                break;
        }
        $this->randomId = fake()->lexify('?????');
        $this->class = $class;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}
