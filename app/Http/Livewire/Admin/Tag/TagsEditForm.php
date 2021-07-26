<?php


namespace App\Http\Livewire\Admin\Tag;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Tag;

class TagsEditForm extends Component
{
    public Tag $tag;
    public $tagId;
    public function mount()
    {
        $this->tagId = $this->tag->id;
    }

    protected function rules()
    {
        return  [
            'tag.name' => "required|unique:tags,name" . $this->tagId,
        ];
    }

    public function editTag()
    {
        $this->validate();
        $this->tag->save();
        $this->emit('editSuccess');
    }

    public function cancelEdit()
    {
        if($this->tag->isDirty()) {
            $this->tag->refresh();
        }
        $this->emit('resetEditId');
    }

    public function render()
    {
        return view('admin.livewire.tags.tags-edit-form');
    }
}
