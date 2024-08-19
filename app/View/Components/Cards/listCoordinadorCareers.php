<?php

namespace App\View\Components\Cards;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listCoordinadorCareers extends Component
{
    public $user;
    public $careers;

    /**
     * Create a new component instance.
     */
    public function __construct($user)
    {
        $this->careers = Career::where('coordinador_matricula', $user)->orderBy('created_at','desc')->get(['abbreviation','name','color']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-coordinador-careers');
    }
}
