<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{

    public function index() {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'email|required',
            'password' => 'required',
        ];
        $request->validate($rules);

        $adminRole = Role::where('name', 'admin')->first();
        $user = User::where('email', $request->email)->first();
        if(is_null($user)) {
            return back()->withErrors(['errors' => 'email or password wrong!']);
        }
        if($user->role_id != $adminRole->id) {
            return redirect()->route('login');
        }

        $user = Auth::attempt($request->only('email','password'));

        return redirect()->route('admin.dashboard');
    }
}
