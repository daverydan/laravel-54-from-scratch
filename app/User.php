<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

    // Post $post - comes from new Post instance in PostController
    // user > publish > post < follows the speaking principle
	// auth()->user()->publish(new Post(request(['title', 'body'])));
	// You can do this because of the relationship between user & post
	// if you have an existing instance like "new Post()", you can save the 
	// existing model you have, therefor auto saving the user_id field
    public function publish(Post $post)
    {
		/*Post::create([
			'title' => request('title'),
			'body' => request('body'),
			'user_id' => auth()->id()
		]);*/

		$this->posts()->save($post);
    }
}
