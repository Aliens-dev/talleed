<?php


namespace App\Http\Livewire\Admin\Category;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Category;

class CategoriesEditForm extends Component
{
    public Category $category;
    public $catId;
    public function mount()
    {
        $this->catId = $this->category->id;
    }

    protected function rules()
    {
        return  [
            'category.name' => "required|unique:categories,name" . $this->catId,
            'category.slug' => "required|unique:categories,slug" . $this->catId,
        ];
    }

    public function editCategory()
    {
        $this->validate();
        $this->category->save();
        $this->emit('editSuccess');
    }

    public function cancelEdit()
    {
        if($this->category->isDirty()) {
            $this->category->refresh();
        }
        $this->emit('resetEditId');
    }

    public function render()
    {
        return view('admin.livewire.categories.categories-edit-form');
    }
}
