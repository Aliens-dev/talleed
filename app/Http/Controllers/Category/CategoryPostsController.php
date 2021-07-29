<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryPostsController extends Controller
{

    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(10);
        return view("categories.index",compact(["posts","category"]));
    }
}
