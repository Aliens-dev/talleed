<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except('show',"index");
    }


    public function index()
    {
        $posts = Post::published()->paginate(10);
        return view('posts.index', compact(['posts']));
    }

    /**
     * @param Post $post
     * @return View| RedirectResponse
     */
    public function show(Post $post)
    {
        /*
        $authorize = Gate::inspect("show", $post);
        if($authorize->denied()) {
            return redirect()->route('index');
        }
        */
        $visitor_ip = $_SERVER["REMOTE_ADDR"];
        Visitor::create([
            'visitor_ip' => $visitor_ip,
            'post_id' => $post->id
        ]);
        return view('posts.show', compact("post"));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            "title" => "required|unique:posts|min:5|max:100",
            "body" => "required|min:200",
            "excerpt" => "required|min:20|max:200",
            "status" => "required",
            'field' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|mimes:jpg,bmp,png',
            'tags' => 'sometimes|required',
        ];

        $request->validate($rules);

        // add the post data
        $post = new Post();
        if($request->status == 'draft') {
            $post->status = 'draft';
        }

        if($request->hasFile('thumbnail')) {
            $image_url = $request->file('thumbnail')->store('users/'.\auth()->id().'/posts');
            /*
            $image = $request->file('thumbnail');
            $imageName = $request->file('thumbnail')->getClientOriginalName();
            $public_path = public_path('file_uploads');
            Storage::makeDirectory('/users/'.\auth()->id().'/posts/');
            $image_url =  '/users/'.\auth()->id().'/posts/thumb-'.Str::random(5).'-'.$imageName;
            Image::make($image->getRealPath())
                ->resize(800,600)
                ->save($public_path.$image_url);
            */
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::id();
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->thumbnail = $image_url;
        $post->category_id = $request->field;
        $post->save();

        // add tags By ID
        if(is_array($request->tags)) {
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
        }
        return redirect()->route('posts.show',$post->slug)->with(['success' => 'Post added successfully']);
    }

    /**
     * @param Post $post
     * @return View
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);

        return view('posts.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        // Check authorization
        Gate::authorize('update', $post);

        $rules = [
            "title" => "required|min:5|max:100|unique:posts,title,". $post->id,
            "body" => "required|min:200",
            "excerpt" => "required|min:20|max:200",
            "status" => "required",
            'field' => 'required|exists:categories,id',
            'thumbnail' => 'required|sometimes|image|mimes:jpg,png',
            'tags' => 'sometimes|required',
        ];

        $request->validate($rules);

        // check the status, if the original was published keep it, or else either draft or pending ( not letting the user publish)
        if($post->status !== 'published') {
            if($request->status == 'draft') {
                $post->status = 'draft';
            }else {
                $post->status = 'pending';
            }
        }
        if($request->hasFile('thumbnail')) {
            Storage::delete($post->thumbnail);
            $image_url = $request->file('thumbnail')->store('users/'.\auth()->id().'/posts');
            /*
            $image = $request->file('thumbnail');
            $imageName = $request->file('thumbnail')->getClientOriginalName();
            $public_path = public_path('file_uploads');
            $image_url =  '/users/'.\auth()->id().'/posts/thumb-'.Str::random(5).'-'.$imageName;
            Image::make($image->getRealPath())
                ->resize(800,600)
                ->save($public_path.$image_url);
            */
            $post->thumbnail = $image_url;
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->author_id = Auth::id();
        $post->body = $request->body;
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->field;
        $post->save();

        if(is_array($request->tags)) {
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
        }

        return redirect()->route('posts.show',$post->slug)->with(['success' => 'Post updated successfully']);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return JsonResponse|RedirectResponse
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        if($request->ajax()) {
            return response()->json(['success' => true], 200);
        }
        return redirect()->route('users.profile', Auth::id())->with(['success' => 'successfully deleted post']);
    }
}
