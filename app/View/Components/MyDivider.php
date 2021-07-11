<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyDivider extends Component
{
    public $line;

    /**
     * Create a new component instance.
     *
     * @param $line
     */
    public function __construct($line = true)
    {
        $this->line = $line;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.my-divider');
    }
}
