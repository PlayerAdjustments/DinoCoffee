<?php

namespace App\View\Components\Developer\Charts;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class recentUserCount extends Component
{

    public $totalUsersThisYear;
    public $totalUsersLastYear;
    public $performancePercentage;
    public $usersRegisteredThisYear = [];
    public $usersRegisteredLastYear = [];
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        /**Inneficient method of getting data for each month, since it requires going through all the monts each the component is generated. */
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        foreach($months as $m){
            array_push($this->usersRegisteredThisYear, User::withTrashed()->whereMonth('created_at', $m)->whereYear('created_at', date('Y'))->count());
            array_push($this->usersRegisteredLastYear, User::withTrashed()->whereMonth('created_at', $m)->whereYear('created_at', date('Y')-1)->count());
        }

        $this->totalUsersThisYear = User::withTrashed()->whereYear('created_at', date('Y'))->count();
        $this->totalUsersLastYear = User::withTrashed()->whereYear('created_at', date('Y')-1)->count();
        if($this->totalUsersLastYear <= 0) $this->totalUsersLastYear = 1;
        $this->performancePercentage = ($this->totalUsersThisYear/$this->totalUsersLastYear)*100;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.developer.charts.recent-user-count');
    }
}
