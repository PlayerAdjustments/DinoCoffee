<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $id,
    public Collection $data,
    public array $columnDetails = [],
    public bool $actions = false,
    public bool $pagination = true)
    {
        $this->id = 'datatable-'.$id;
        $this->data = $data;
        $this->columnDetails = $columnDetails;
        $this->actions = $actions;
        $this->pagination = $pagination;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table');
    }
}
