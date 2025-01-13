<?php

namespace App\View\Components\Navbar\ProfileUser;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ProfileButton extends Component
{
    public $user;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //? This could later be sectioned to only get the required info.
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.profile-user.profile-button');
    }
}
