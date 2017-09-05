<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;

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

    //Edit & Update Previledge
    public function update(User $user, Post $post){
        return $user->id == $post->user_id;
    }

    //Delete Previledge
    public function delete(User $user, Post $post){
        return $user->id == $post->user_id;
    }
}


/*
 *
 * Step 1 : Create Policy , php artisan make:policy PolicyName
 * Step 2 : Register Policy , Go to Providers\AuthServiceProvider.php to register this policy
 * Step 3 : Judge & Use Policy , Controller\..Controller.php, edit business logic part
 *
 *
 * */
