<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    use WithPagination;
    public string $search = '';
    public $orderField = 'title';
    public $orderDirection = 'ASC';
    public $editId = 0;
    public $selected = [];
    public $availableStatus = [
        'published' => 'منشور',
        'pending' => 'معلق',
        'draft' => 'مسودة'
    ];

    public function setOrderField($name) {
        if($name === $this->orderField) {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC': 'ASC';
        }else {
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function updateStatus($status,$postId) {
        $post = Post::find($postId);
        $post->status = $status;
        $post->save();
        Session::flash('success', 'تم التعديل بنجاح');
    }

    public function closeMessage() {
        Session::remove('success');
    }

    public function deletePosts() {
        Post::destroy($this->selected);
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
        return view('admin.livewire.posts-table', [
            'posts' => Post::
                where('title', 'LIKE' ,"%{$this->search}%")
                ->orWhereHas('user', function($query) {
                    return $query->where('fname','LIKE', "%{$this->search}%")
                        ->orWhere('lname', 'LIKE', "%{$this->search}%")
                        ->orWhere('email', 'LIKE', "%{$this->search}%");
                })
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(5)
        ]);
    }
}
