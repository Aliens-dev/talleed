<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public string $search = '';
    public $orderField = 'fname';
    public $orderDirection = 'ASC';
    public $editId = 0;
    public $selected = [];

    public function setOrderField($name) {
        if($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC': 'ASC';
        }else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function closeMessage() {
        Session::remove('success');
    }

    public function deleteUsers() {
        User::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function updating($name, $val) {
        if($name === 'search') {
            $this->resetPage();
        }
    }

    public function setEditId($id)
    {
        $this->editId = $id;
    }

    public function render()
    {
        return view('admin.livewire.users-table', [
            'users' => User::
                where('fname', 'LIKE' ,"%{$this->search}%")
                ->orWhere('lname', 'LIKE' ,"%{$this->search}%")
                ->orWhere('email', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5)
        ]);
    }
}
