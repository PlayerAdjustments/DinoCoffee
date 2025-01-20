<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    public array $addRecordButton;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public Collection $data,
        public string $addRecordRoute,
        public string $addRecordText,
        public array $columnDetails = [],
        public bool $actions = false,
    ) {
        $this->id = 'datatable-' . $id;
        $this->data = $data;
        $this->columnDetails = $columnDetails;
        $this->actions = $actions;
        $this->addRecordButton = [
            'route' => $addRecordRoute,
            'text' => $addRecordText
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table');
    }
}
