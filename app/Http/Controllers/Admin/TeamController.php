<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.teams.index');
    }

    public function show(Request $request, $teamId)
    {
        $team = Team::where('id',(int)$teamId)->first();
        return view('admin.teams.show', compact('team'));
    }
}
