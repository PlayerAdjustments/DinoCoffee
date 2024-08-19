<?php

namespace App\View\Components\Badges;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sexbadge extends Component
{
    public $class;
    public $sex;
    /**
     * Create a new component instance.
     */
    public function __construct($sex)
    {

        switch($sex){
            case 'F':
                $sex = 'Mujer';
                $class = 'bg-fuchsia-100 text-fuchsia-800 dark:bg-fuchsia-900 dark:text-fuchsia-300';
                break;
            case 'M':
                $sex = 'Hombre';
                $class = 'bg-sky-100 text-sky-800 dark:bg-sky-800 dark:text-sky-300';
                break;
            default:
                $sex = 'Unknown';
                $class = 'bg-gray-100 text-gray-800 dark:bg-slate-500 dark:text-slate-800';
                break;
        }

        $this->sex = $sex;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badges.sexbadge');
    }
}
