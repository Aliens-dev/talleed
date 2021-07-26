<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $inspect = Gate::inspect('view', $user);
        if($inspect->denied()) {
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
        $inspect = Gate::inspect('update', $user);
        if($inspect->denied()) {
            return redirect()->route('index');
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required',
        ];
        $request->validate($rules);

        if(Hash::check($user->password,$user->password)) {
            return back()->withErrors(['password' => 'password doesn\'t match']);
        }
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->save();
        return back()->with(['success' => 'profile updated']);
    }
}
