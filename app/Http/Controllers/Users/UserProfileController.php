<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    public function index(User $user)
    {
        return view('users.profile', compact('user'));
    }

    public function edit(User $user)
    {
        $inspect = Gate::inspect('view', $user);
        if($inspect->denied()) {
            return redirect()->route('index');
        }
        return view('users.edit', compact('user'));
    }
}
