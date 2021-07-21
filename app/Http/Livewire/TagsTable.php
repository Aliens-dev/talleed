<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class TagsTable extends Component
{
    use WithPagination;
    public string $search = '';
    public $orderField = 'title';
    public $orderDirection = 'ASC';
    public $editId = 0;
    public $selected = [];
    public $addFormVisible = false;

    public $newTag = [
        'name' => '',
    ];

    protected $listeners = [
        'editSuccess' => 'editSuccess',
        'resetEditId' => 'resetEditId',
    ];

    public function closeMessage() {
        Session::remove('success');
    }

    public function editSuccess() {
        Session::flash("success", 'تم التعديل بنجاح');
        $this->resetEditId();
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
    public function resetEditId()
    {
        $this->reset('editId');
    }
    public function setOrderField($name)
    {
        if($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC': 'ASC';
        }else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }
    public function deleteTags() {
        Tag::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function toggleAddForm() {
        $this->addFormVisible = !$this->addFormVisible;
        $this->reset('newTag');
    }

    public function addTag()
    {
        $rules = [
            'newTag.name' => 'required|string|unique:tags,name',
        ];
        $this->validate($rules);
        Tag::create([
            'name' => $this->newTag['name'],
        ]);
        $this->reset('newTag','addFormVisible');
    }


    public function render()
    {
        return view('admin.livewire.tags-table', [
            'tags' => Tag::
                where('name', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5)
        ]);
    }
}
