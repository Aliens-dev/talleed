<?php


namespace App\Http\Livewire;


use Illuminate\Support\Facades\Session;

trait LivewireHelpers
{
    public string $search = '';
    public $orderField = 'id';
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
    public function updating($name, $val) {
        if($name === 'search') {
            $this->resetPage();
        }
    }

    public function closeMessage() {
        Session::remove('success');
    }

    public function editSuccess() {
        Session::flash("success", 'تم التعديل بنجاح');
        $this->resetEditId();
    }

    public function setEditId($id)
    {
        $this->editId = $id;
    }

    public function resetEditId()
    {
        $this->reset('editId');
    }

}
