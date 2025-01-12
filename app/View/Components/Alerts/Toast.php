<?php

namespace App\View\Components\alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'Debug',
        public string $randomId = '',
        public string $class = '',
        public string $icon = '',
        public string $message = ''
    ) {

        $alertMap = [
            'Success' => [
                'class' => 'text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>'
            ],
            'Error' => [
                'class' => 'text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>'
            ],
            'Warning' => [
                'class' => 'text-orange-500 bg-orange-100 dark:bg-orange-700 dark:text-orange-200',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="28" fill="currentColor"><path d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-13a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1zm0 10a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>'
            ],
            'Info' => [
                'class' => 'text-blue-500 bg-blue-100 dark:bg-blue-700 dark:text-blue-200',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-6 h-6" viewBox="0 0 24 24" class="humbleicons hi-info-circle"><path xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11h1v5.5m0 0h1.5m-1.5 0h-1.5M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9.5-4v-.5h.5V8h-.5z"/></svg>'
            ],
            'Debug' => [
                'class' => 'text-gray-500 bg-gray-100 dark:bg-gray-700 dark:text-gray-200',
                'icon' => '<svg viewBox="0 0 72 72" class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="m5 52s15-3 17-10 14.6667-11.1667 20.8333-8.5833c0 0 6.3333.5833 8.25-7.4167s3.9167-17 10.9167-16 6.1667 6.3333 4.0833 7.1667c-2.0833.8333-5.0833.8333-6.0833 2.3333s-2.1667 16.1667-6.5833 19.8333c0 0-4.9167 6.5-4.6667 9.5833.25 3.0834 1.8333 12.3334-1.75 12.0834-3.6293-.2532-3-7-3-8s-8-3-11-1-2.1667 8-4.5833 8.5-4.9167.3333-5.6667-.5833c-.75-.9167.5994-6.6877-.5-8.6667" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>'
            ],
            'default' => [
                'class' => 'text-purple-500 bg-purple-100 dark:bg-purple-700 dark:text-purple-200',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 64c0-17.7 14.3-32 32-32l320 0 64 0c70.7 0 128 57.3 128 128s-57.3 128-128 128l-32 0c0 53-43 96-96 96l-192 0c-53 0-96-43-96-96L96 64zM480 224l32 0c35.3 0 64-28.7 64-64s-28.7-64-64-64l-32 0 0 128zM32 416l512 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 480c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>'
            ]
        ];

        $alert = $alertMap[$type] ?? $alertMap['default'];

        $this->randomId = fake()->lexify('?????');
        $this->class = $alert['class'];
        $this->icon = $alert['icon'];
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alerts.toast');
    }
}
