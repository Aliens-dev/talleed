<?php

namespace App\Http\Livewire\Admin\Team;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class TeamMembersTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $addFormVisible = false;
    public Team $team;

    public $user = [
        'username' => '',
    ];

    public function mount($teamId)
    {
        $this->team = Team::where('id',$teamId)->first();
    }
    public function toggleAddForm() {
        $this->addFormVisible = !$this->addFormVisible;
        $this->reset('user');
    }

    public function deleteUserFromTeam() {

        for($i=0;$i < count($this->selected); $i++) {
            $user = User::find($this->selected[$i]);
            $user->team_id = -1;
            $user->save();
        }
        $this->reset('selected');
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function addUserToTeam()
    {
        $rules = [
            'user.username' => 'required|string',
        ];

        $this->validate($rules);

        $user = User::where('username',$this->user['username'])->first();
        if(is_null($user)) {
            Session::flash('error','اسم المستخدم خاطئ');
            return;
        }
        $user->team_id = $this->team->id;
        $user->save();

        $this->reset('user','addFormVisible');
    }
    public function render()
    {
        return view('admin.livewire.team.team-members-table', [
            'users' => $this->team->users()
                ->orderBy($this->orderField,$this->orderDirection)
                ->paginate(10)
        ]);
    }
}
