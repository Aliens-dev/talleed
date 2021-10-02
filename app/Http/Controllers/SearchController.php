<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request)
    {

        $rules = [
            'search' => "required",
        ];

        $this->validate($request, $rules);

        $searchQuery = Post::query();

        $searchQuery->where('title', 'LIKE', '%'. $request->search .'%')
            ->orWhere('body', 'LIKE', '%'. $request->search .'%')
            ->orWhereHas('category', function($query) use($request,$searchQuery) {
                $query->where('name', 'LIKE', '%'. $request->search .'%');
            })
            ->orWhereHas('tags', function($query) use($request,$searchQuery) {
                $query->where('name', 'LIKE', '%'. $request->search .'%');
            });
        $posts = $searchQuery->paginate(10);

        return view('posts.search', compact('posts'));
    }
}
