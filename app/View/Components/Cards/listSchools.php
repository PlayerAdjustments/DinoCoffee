<?php

namespace App\View\Components\Cards;

use App\Models\School;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class ListSchools extends Component
{
    public $schools;
    /**
     * Create a new component instance.
     */
    public function __construct(Collection $schools)
    {
        $this->schools = $schools;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-schools');
    }
}
