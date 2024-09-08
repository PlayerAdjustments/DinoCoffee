<?php

namespace App\View\Components\Developer;

use App\Models\Notification;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $user;
    public $notifications;
    public $totalNotifications;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->notifications = Notification::where('user_matricula',Auth::user()->matricula)->limit(3)->orderBy('created_at','desc')->get(['id','subject','body','created_at','icon','deleted_at']);
        $this->totalNotifications = Notification::where('user_matricula', Auth::user()->matricula)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.developer.navbar');
    }
}
