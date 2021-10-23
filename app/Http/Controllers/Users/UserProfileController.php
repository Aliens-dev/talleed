<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(User $user)
    {
        $posts = $user->posts()->published()->paginate(10);
        return view('users.profile', compact(['user','posts']));
    }

    public function pending(User $user)
    {
        $inspect = Gate::check('view', $user);
        if(! $inspect) {
            return redirect()->route('users.profile', $user->id);
        }
        $posts = $user->posts()->where('status', 'pending')->paginate(10);
        return view('users.pending', compact(['user','posts']));
    }

    public function draft(User $user)
    {
        $inspect = Gate::inspect('view', $user);
        if($inspect->denied()) {
            return redirect()->route('users.profile', $user->id);
        }
        $posts = $user->posts()->where('status', 'draft')->paginate(10);
        return view('users.draft', compact(['user','posts']));
    }

    public function notifications(User $user)
    {
        $inspect = Gate::inspect('view', $user);
        if($inspect->denied()) {
            return redirect()->route('users.profile', $user->id);
        }
        return view('users.notifications', compact(['user']));
    }

    public function edit(User $user)
    {
        $inspect = Gate::check('update', $user);

        if(! $inspect) {
            return redirect()->route('index');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username,'.$user->id,
            'speciality' => 'required',
            'about_me' => 'required|string|max:255|min:20',
            'user_image' => 'required|sometimes|image|mimes:jpg,png',
            'field_id' => 'required|exists:categories,id',
            'social_media_account' => 'required|string|url',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required',
        ];
        $request->validate($rules);

        if(Hash::check($user->password,$user->password)) {
            return back()->withErrors(['extra_errors' => 'password doesn\'t match']);
        }

        if($request->hasFile('user_image')) {
            Storage::delete($user->user_image);
            $image_url = $request->file('user_image')->store('users/profiles');
            $user->user_image = $image_url;
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->field_id = $request->field_id;
        $user->speciality = $request->speciality;
        $user->social_media_account = $request->social_media_account;
        $user->email = $request->email;
        $user->save();
        return back()->with(['success' => 'profile updated']);
    }
}
