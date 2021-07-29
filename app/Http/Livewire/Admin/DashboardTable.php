<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Visitor;
use App\Notifications\PostStatusChangedNotification;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTable extends Component
{
    use WithPagination;
    public string $search = '';
    public $orderField = 'title';
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
        return view(
            'admin.livewire.dashboard-table',[
                'visitors' => Visitor::
                where('visitor_ip', 'LIKE' ,"%{$this->search}%")
                    ->orderBy($this->orderField, $this->orderDirection)
                    ->paginate(10)
            ]
        );
    }
}
