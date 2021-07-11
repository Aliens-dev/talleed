<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $latest = Post::latest(4)->get();
        return view("index", compact("latest"));
    }
}
