<?php

namespace App\View\Components\Cards;

use App\Models\CareerCode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ListCareerCodes extends Component
{
    public $codes;
    /**
     * Create a new component instance.
     */
    public function __construct(Collection $codes)
    {
        $this->codes = $codes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-career-codes');
    }
}
