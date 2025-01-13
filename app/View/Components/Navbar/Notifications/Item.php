<?php

namespace App\View\Components\Navbar\Notifications;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
//* Change this when Notification model is created.
use App\Models\User as Notification;

class Item extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Wheter the component should be rendered.
     */
    public function shouldRender() : bool
    {
        return !$this->notification->trashed();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.notifications.item');
    }
}
