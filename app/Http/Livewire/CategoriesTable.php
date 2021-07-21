<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{
    use WithPagination;
    public string $search = '';
    public $orderField = 'title';
    public $orderDirection = 'ASC';
    public $editId = 0;
    public $selected = [];
    public $addFormVisible = false;

    public $newCategory = [
        'name' => '',
        'slug' => '',
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
    public function deleteCategories() {
        Category::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function toggleAddForm() {
        $this->addFormVisible = !$this->addFormVisible;
        $this->reset('newCategory');
    }

    public function addCategory()
    {
        $rules = [
            'newCategory.name' => 'required|string|unique:categories,name',
            'newCategory.slug' => 'required|string|unique:categories,slug',
        ];
        $this->validate($rules);
        Category::create([
            'name' => $this->newCategory['name'],
            'slug' => $this->newCategory['slug'],
        ]);
        $this->reset('newCategory','addFormVisible');
    }


    public function render()
    {
        return view('admin.livewire.categories-table', [
            'categories' => Category::
                where('name', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5)
        ]);
    }
}
