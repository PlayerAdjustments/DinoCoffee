<?php

namespace App\View\Components\Alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class AlertsManager extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Wheter the component shoud be rendered.
     */
    public function shouldRender() : bool
    {
        $alertKeys = ['Success', 'Error', 'Warning', 'Info', 'Debug'];
        $errors = session('errors', app('Illuminate\Support\MessageBag'));
        Log::info('Errors: '.print_r($errors, true));
        return $errors->any() || collect($alertKeys)->some(fn($key) => session()->has($key));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.alerts-manager');
    }
}
