<?php

namespace App\View\Components\Cards;

use App\Models\School;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listSchools extends Component
{
    public $user;
    public $schools;
    /**
     * Create a new component instance.
     */
    public function __construct($user)
    {
        $this->schools = School::where('director_matricula', $user)->orderBy('created_at','desc')->get(['abbreviation','name','color']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.list-schools');
    }
}
