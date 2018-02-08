<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

// extending our own model class
class Post extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
