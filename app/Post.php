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
}
