<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function show(?User $user, Post $post)
    {
        return $post->status !== 'published' ?
            optional($user)->id === (int)$post->author_id ||  optional($user)->role_id === (int) Role::where('name','admin')->first()->id
            : true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $post->status !== 'published' &&
            (int)$user->id === (int)$post->author_id || (int)$user->role_id == (int)Role::where('name','admin')->first()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $post->status !== 'published' &&
            (int)$user->id === (int)$post->author_id || (int)$user->role_id == (int)Role::where('name','admin')->first()->id;
    }
}
