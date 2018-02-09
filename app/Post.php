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

    public function user() // $post->user or $comment->post->user->name
    {
    	return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	// Eloquent takes care of the $post->id because of the relationship
    	$this->comments()->create(compact('body'));
    }
}
