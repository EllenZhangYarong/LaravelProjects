<?php

namespace App;

use App\Model;

class Post extends Model
{
    //
    protected $guarded =[];

    //Post's user
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    //Comments for a post : One article has many comments. one to many
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    //related with Like, user which has a $user_id like this post or not
    public function like($user_id){
        return $this->hasOne('App\Like')->where('user_id',$user_id);
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
