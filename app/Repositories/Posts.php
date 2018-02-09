<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

// for extracting repetitive code out of the controller
// forgo doing query scopes, if neccessary

class Posts
{
	protected $redis;

	public function __construct(Redis $redis)
	{
		// redis, as an example, is a dependency of Posts
		// DI = Dependency Injection
		// then Laravel will try to new up an instance of the Redis Class
		// this is made possible by Laravel's Service Container
		$this->redis = $redis;
	}

	public function all()
	{
		// return all relevant posts
		return Post::all();
		// won't be as simple as above, could be like following:
		// return Post::select()->get(); etc.
	}
}