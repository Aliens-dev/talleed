<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index() {
        $latest = Post::latests(4)->get();
        $topRead = Post::topRead(5)->get();
        return view("index", compact(["latest","topRead"]));
    }
}
