<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{
    public $post;
    public $img_col;
    public $content_col;
    public $img;

    /**
     * Create a new component instance.
     *
     * @param $post
     * @param string $img
     * @param string $img_col
     * @param string $content_col
     */
    public function __construct($post, $img = '',$img_col ='is-two-fifths', $content_col ='is-three-fifths')
    {
        $this->post = $post;
        $this->img = $img;
        $this->img_col = $img_col;
        $this->content_col = $content_col;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
