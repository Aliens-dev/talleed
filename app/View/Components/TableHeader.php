<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHeader extends Component
{
    public $orderBy;
    public $direction;
    public $name;

    /**
     * TableHeader constructor.
     * @param string $orderBy
     * @param string $direction
     * @param string $name
     */
    public function __construct($orderBy, $direction, $name)
    {
        $this->orderBy = $orderBy;
        $this->direction = $direction;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.table-header', [
            'visible' => $this->name == $this->orderBy
        ]);
    }
}
