<?php

namespace App\View\Components\Sidebar\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Student extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Wheter the component should be rendered
     */
    public function shouldRender()
    {
        return Auth::user()->role === 'ALU';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.roles.student');
    }
}
