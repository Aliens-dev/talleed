<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('admin.menus.index');
    }

    public function show(Request $request, $menuId)
    {
        $menu = Menu::where('id',(int)$menuId)->first();
        return view('admin.menus.show', compact('menu'));
    }
}
