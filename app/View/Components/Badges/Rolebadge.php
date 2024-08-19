<?php

namespace App\View\Components\Badges;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rolebadge extends Component
{
    public $class;
    public $role;
    /**
     * Create a new component instance.
     */
    public function __construct($role)
    {
        switch ($role) {
            case 'DEV':
                $class = "bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300";
                break;
            case 'ADM':
                $class = "bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-300";
                break;
            case 'DIR':
                $class = "bg-emerald-100 text-emerald-800 dark:bg-emerald-900 dark:text-emerald-300";
                break;
            case 'COO':
                $class = "bg-cyan-100 text-cyan-800 dark:bg-cyan-900 dark:text-cyan-300";
                break;
            case 'DOC':
                $class = "bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-300";
                break;
            case 'ALU':
                $class = "bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300";
                break;
            default:
                $role = "Unknown";
                $class = "bg-gray-100 text-gray-800 dark:bg-slate-500 dark:text-slate-800";
                break;
        }

        $this->role = $role;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badges.rolebadge');
    }
}
