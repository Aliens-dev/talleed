<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('show',"index");
    }

    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact("post"));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $rules = [
            "title" => "required|unique:posts|min:5|max:100",
            "body" => "required",
            "status" => "required",
            'field' => 'required|exists:categories,id',
            'tags' => 'sometimes|required',
        ];

        $request->validate($rules);

        // add the post data
        $post = new Post();
        if($request->status == 'draft') {
            $post->status = 'draft';
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::id();
        $post->body = $request->body;
        $post->save();
        // link the category
        $post->categories()->attach($request->field);

        // add tags
        $tags = [];
        foreach ($request->tags as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag
            ]);
            if($tag) {
                $tags [] = $tag->id;
            }
        }
        $post->tags()->syncWithoutDetaching($tags);
        return redirect()->route('posts.show',$post->slug)->with(['success' => 'Post added successfully']);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::check('update', $post);
        $rules = [
            "title" => "required|min:5|max:100|unique:posts,title,". $post->id,
            "body" => "required",
            "status" => "required",
            'field' => 'required|exists:categories,id',
            'tags' => 'sometimes|required',
        ];

        $request->validate($rules);

        if($post->status !== 'published') {
            if($request->status == 'draft') {
                $post->status = 'draft';
            }else {
                $post->status = 'pending';
            }
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::id();
        $post->body = $request->body;
        $post->save();

        // link the category
        $post->categories()->attach($request->field);

        // add tags
        $tags = [];
        foreach ($request->tags as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag
            ]);
            if($tag) {
                $tags [] = $tag->id;
            }
        }
        $post->tags()->sync($tags);

        return redirect()->route('posts.show',$post->slug)->with(['success' => 'Post updated successfully']);
    }

    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        if($request->ajax()) {
            return response()->json(['success' => true], 200);
        }
        return redirect()->route('users.profile', Auth::id())->with(['success' => 'successfully deleted post']);
    }
}
