<?php

namespace App\Policies;

use App\User;
use App\Model\Post;
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
    //注意参数顺序
    public function update(User $user,Post $post){
        return $user->id==$post->user_id;
    }
    public function destroy(User $user,Post $post){
        return $user->id==$post->user_id;
    }
}
