<?php

namespace App;

use App\Model;

class Post extends Model
{
    //
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
