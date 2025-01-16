<?php

namespace App\View\Components\Navbar\Notifications;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationButton extends Component
{
    public $notifications;
    public $totalNotifications;

    /**
     * Create a new component instance.
     */
    public function __construct(public bool $functional = false)
    {
        $user = Auth::user();
        $this->notifications = $user->notifications()->limit(5)->get();
        $this->totalNotifications = $user->notifications->count();
    }

    /**
     * Wheter the component should be rendered.
     */
    public function shouldRender() : bool
    {
        return $this->functional;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.notifications.notification-button');
    }
}
