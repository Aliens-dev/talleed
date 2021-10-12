<?php

namespace App\Http\Livewire\Admin\Post;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostStatusChangedNotification;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class PostsTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $availableStatus = [
        'published' => 'منشور',
        'pending' => 'معلق',
        'draft' => 'مسودة'
    ];

    public function updateStatus($status,$postId) {
        $post = Post::find($postId);
        $post->status = $status;
        $post->save();
        $post->user->notify(new PostStatusChangedNotification($post));
        Session::flash('success', 'تم التعديل بنجاح');
    }

    public function deletePosts() {
        Post::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        $post = Post::query();
        if($this->orderField === 'visitors') {
            $post->withCount('visitors')->orderBy('visitors_count', $this->orderDirection);
        }

        return view('admin.livewire.posts.posts-table', [
            'posts' => $post->
                where('title', 'LIKE' ,"%{$this->search}%")
                ->orWhereHas('user', function($query) {
                    return $query->where('fname','LIKE', "%{$this->search}%")
                        ->orWhere('lname', 'LIKE', "%{$this->search}%")
                        ->orWhere('email', 'LIKE', "%{$this->search}%");
                })
                ->orderBy($this->orderField, $this->orderDirection)
                ->paginate(10)
        ]);
    }
}
