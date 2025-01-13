<?php

namespace App\View\Components\Alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class AlertsManager extends Component
{
    /**
     * Alerts passed to view.
     */
    public array $alerts = [];
    public ?MessageBag $errors;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //Retrieve all other alerts
        $alertKeys = ['Success', 'Error', 'Warning', 'Info', 'Debug'];
        $this->alerts = collect($alertKeys)
        ->mapWithKeys(fn($key) => [$key => (array) session($key, [])])
        ->filter(fn($messages) => !empty($messages))
        ->toArray();

        // Retrieve validation errors from the session
        $errorBag = session('errors', new ViewErrorBag());
        $this->errors = $errorBag->getBag('default');
        
        Log::debug(print_r($this->alerts, true));
    }

    /**
     * Wheter the component shoud be rendered.
     */
    public function shouldRender() : bool
    {
        return !empty($this->alerts) || $this->errors->any();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.alerts-manager');
    }
}
