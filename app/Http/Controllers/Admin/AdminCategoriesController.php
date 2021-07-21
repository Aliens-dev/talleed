<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.index');
    }
}
