<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * @param Post $post
     */
    public function show(Post $post)
    {
        return view('posts.show', compact("post"));
    }
}
