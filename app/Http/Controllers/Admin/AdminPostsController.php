<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminPostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

}
