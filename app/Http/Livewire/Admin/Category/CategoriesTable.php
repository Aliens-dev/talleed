<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $addFormVisible = false;

    public $newCategory = [
        'name' => '',
        'slug' => '',
    ];

    protected $listeners = [
        'editSuccess' => 'editSuccess',
        'resetEditId' => 'resetEditId',
    ];

    public function deleteCategories() {
        Category::destroy($this->selected);
        $this->reset('selected');
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
        return view('admin.livewire.categories.categories-table', [
            'categories' => Category::
                where('name', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(10)
        ]);
    }
}
