<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{


    public function index()
    {
        $user = Auth::user();
        return view('admin.account.index',compact('user'));
    }

    public function update(Request $request)
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,email,'. Auth::id(),
            'email' => 'required|unique:users,email,'. Auth::id(),
            'password' => 'required',
        ];

        $this->validate($request, $rules);

        $user = Auth::user();
        if(! Hash::check($request->password,$user->password)) {
            return back()->with(['extra_errors' => 'كلمة السر خاطئة']);
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        return back()->with(['success' => 'تم تعديل معلومات الحساب']);
    }
}
