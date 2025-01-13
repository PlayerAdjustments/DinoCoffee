<?php

namespace App\View\Components\Navbar\Notifications;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Dropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Collection $notifications, public int $totalNotifications)
    {
        $this->notifications = $notifications;
        $this->totalNotifications = $totalNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.notifications.dropdown');
    }
}
