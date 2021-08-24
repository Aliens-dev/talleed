<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class TagsTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $addFormVisible = false;

    public $newTag = [
        'name' => '',
    ];

    protected $listeners = [
        'editSuccess' => 'editSuccess',
        'resetEditId' => 'resetEditId',
    ];

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
        return view('admin.livewire.tags.tags-table', [
            'tags' => Tag::
                where('name', 'LIKE' ,"%{$this->search}%")
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5)
        ]);
    }
}
