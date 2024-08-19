<?php

namespace App\View\Components\Cards;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listCareers extends Component
{
    public $school;
    public $careers;
    /**
     * Create a new component instance.
     */
    public function __construct($school)
    {
        $this->school = $school;
        $this->careers = Career::where('school_abbreviation', $school)->orderBy('created_at','asc')->get(['abbreviation','name','color','school_abbreviation']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-careers');
    }
}
