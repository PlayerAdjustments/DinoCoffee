<?php

namespace App\View\Components\Cards;

use App\Models\CareerCode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListCareerCodes extends Component
{
    public $codes;
    /**
     * Create a new component instance.
     */
    public function __construct($career)
    {
        $this->codes = CareerCode::where('career_abbreviation',$career)->withTrashed()->get(['id','joined','career_abbreviation','code','deleted_at']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-career-codes');
    }
}
