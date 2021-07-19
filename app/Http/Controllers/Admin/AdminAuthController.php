<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    }
}
