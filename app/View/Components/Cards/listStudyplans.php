<?php

namespace App\View\Components\Cards;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listStudyplans extends Component
{
    public $studyPlans;
    /**
     * Create a new component instance.
     */
    public function __construct($career)
    {
        $this->studyPlans = Career::withTrashed()->with('studyPlans')->where('abbreviation',$career)->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-studyplans');
    }
}
