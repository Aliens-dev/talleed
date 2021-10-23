<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function status(Request $request, User $user)
    {
        $rules = [
            'action' => "required|in:pending,activated"
        ];
        $this->validate($request,$rules);
        $user->user_status = $request->action;
        $user->update();
        return back()->with('success', " تم تعديل الحساب");
    }
}
