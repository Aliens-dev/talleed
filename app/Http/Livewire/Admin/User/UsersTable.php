<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\Livewire\LivewireHelpers;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public function deleteUsers() {
        User::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        return view('admin.livewire.users.users-table', [
            'users' => User::
                where('fname', 'LIKE' ,"%{$this->search}%")
                ->orWhere('lname', 'LIKE' ,"%{$this->search}%")
                ->orWhere('email', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(10)
        ]);
    }
}
