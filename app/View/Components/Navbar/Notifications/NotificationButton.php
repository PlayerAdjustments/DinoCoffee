<?php

namespace App\View\Components\Navbar\Notifications;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
//TODO Notifications model

class NotificationButton extends Component
{
    public $notifications;
    public $totalNotifications;

    /**
     * Create a new component instance.
     */
    public function __construct(public bool $functional = false)
    {
        //! Should contain a logic that counts the current Auth::user() unread notifications and display them.
        $this->notifications = User::limit(5)->get();
        $this->totalNotifications = User::all()->count();
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
