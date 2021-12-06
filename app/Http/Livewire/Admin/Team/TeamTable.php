<?php

namespace App\Http\Livewire\Admin\Team;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Menu;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class TeamTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $addFormVisible = false;
    public $newTeam = [
        'name' => ''
    ];

    public function toggleAddForm()
    {
        $this->addFormVisible = !$this->addFormVisible;
    }
    public function addTeam()
    {
        $rules = [
            'newTeam.name' => 'required|string|unique:teams,name'
        ];

        $this->validate($rules);
        $team = new Team();
        $team->name = $this->newTeam['name'];
        $team->save();
        $this->reset('newTeam');
        Session::flash('success', 'تم الاضافة بنجاح');
    }

    public function deleteTeams()
    {
        Team::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        return view('admin.livewire.team.team-table', [
            'teams' => Team::where('name', 'LIKE', "%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(10)
        ]);
    }
}
