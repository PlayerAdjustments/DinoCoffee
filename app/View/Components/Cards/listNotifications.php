<?php

namespace App\View\Components\Cards;

use App\Models\Notification;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ListNotifications extends Component
{
    public $notifications;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->notifications = Notification::where('user_matricula', Auth::user()->matricula)->orderBy('created_at','desc')->get(['id','subject','body','created_at','icon','deleted_at']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-notifications');
    }
}
