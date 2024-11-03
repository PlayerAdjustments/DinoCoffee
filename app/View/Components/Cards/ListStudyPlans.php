<?php

namespace App\View\Components\Cards;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListStudyPlans extends Component
{
    public $studyplans;
    public $careercodes;
    /**
     * Create a new component instance.
     */
    public function __construct(Career $career)
    {
        $this->studyplans = $career->codes->flatMap->studyplans;
        $this->careercodes = $career->codes->where('deleted_at', null)->pluck('joined');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-study-plans');
    }
}
