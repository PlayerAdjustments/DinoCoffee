<?php

namespace App\View\Components\Cards;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ListCoordinadorCareers extends Component
{
    public $careers;

    /**
     * Create a new component instance.
     */
    public function __construct(Collection $careers)
    {
        $this->careers = $careers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-coordinador-careers');
    }
}
