<?php

namespace App\View\Components\Navbar\ProfileUser;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.profile-user.profile-dropdown');
    }
}
