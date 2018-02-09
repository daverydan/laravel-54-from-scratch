<?php

namespace App;

use Carbon\Carbon;

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

    public function scopeFilter($query, $filters)
    {
    	if ($month = $filters['month']) {
    		// Carbon parse the month and return the month name
    		$query->whereMonth('created_at', Carbon::parse($month)->month);
    	}

    	if ($year = $filters['year']) {
    		$query->whereYear('created_at', $year);
    	}
    }
}
