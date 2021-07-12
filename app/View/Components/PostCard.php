<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCard extends Component
{
    public $post;
    public $img_col;
    public $content_col;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post,$img_col ='is-two-fifths', $content_col ='is-three-fifths')
    {
        $this->post = $post;
        $this->img_col = $img_col;
        $this->content_col = $content_col;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
