<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserSidebar extends Component
{
    public $user;
    public $editMode;

    /**
     * Create a new component instance.
     *
     * @param $user
     * @param $editMode
     */
    public function __construct($user,$editMode = false)
    {
        $this->user = $user;
        $this->editMode = $editMode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.user-sidebar');
    }
}
