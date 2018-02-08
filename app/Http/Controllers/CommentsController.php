<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
	public function store(Post $post)
	{
		$this->validate(request(), [
			'body' => 'required|min:5'
		],[
			'body.required'=>'A comment with a minimum of 5 characters is required.'
		]);
		$post->addComment(request('body'));
		return back();
	}
}
