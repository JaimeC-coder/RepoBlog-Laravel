<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function author(User $user, Post $post)
    {
        if ($user->id != $post->user_id) {
            return false;
        }
        return true;
    }
    public function published(?User $user, Post $post)//el signo de interrogacion es para que el usuario no sea obligatorio

    {
        if ($post->status == 2) {
            return true;
        }
        return false;
    }
}
