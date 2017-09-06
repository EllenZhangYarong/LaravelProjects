<?php

namespace App;

use App\Model;

class Comment extends Model
{
    protected $table = "comments";

    //Comment belongs to which post
    public function post(){
        return $this->belongsTo('App\Post');
    }

    //Comment belongs to which user
    public function user(){
        return $this->belongsTo('App\User');
    }

}

/*
 * Step 1: create migration file: php artisan make:migration create_comments_table
 * Step 2: edit migration file, add field information
 * Step 3: create table, php artisan migrate
 * Step 4: create model of this table, php artisan make:model Comments
 * Step 5: create relationship with other model
 *          There are seven relationship: hasOne, hasMany, belongsTo, belongsToMany,hasManyThrough,morphMany,morphToMany
 */
