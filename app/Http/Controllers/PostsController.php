<?php

namespace App\Http\Controllers;

use App\Post;
use \App\Repositories\Posts;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
    	// $posts = Post::latest()->get();
    	
    	// $posts = Post::latest();

    	// if ($month = request('month')) {
    		// Carbon parse the month and return the month name
    	// 	$posts->whereMonth('created_at', Carbon::parse($month)->month);
    	// }

    	// if ($year = request('year')) {
    	// 	$posts->whereYear('created_at', $year);
    	// }

    	// Refactor: filter() in Post model
    	$posts = Post::latest()
		    		->filter(request(['month', 'year']))
		    		->get();

		// DI, Auto-Resolution & Repositories
		// using \App\Repositories\Posts - Posts $posts
		// dd($posts); shows DI with Redis class & the Posts instance
		// $posts = $posts->all();

		return view('posts.index', compact('posts', 'archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
    	// dd(request()->all());
		$this->validate(request(), [
			'title' => 'required|min:3',
			'body' => 'required'
		],[
			'title.required' => 'A post title with a minimum of 3 characters is required',
			'body.required' => 'A post body is required'
		]);

		// Post::create(request(['title', 'body']));

		/* Moved to model
			Post::create([
				'title' => request('title'),
				'body' => request('body'),
				'user_id' => auth()->id()
			]);
		*/

		// added user_id field
		auth()->user()->publish(
			new Post(request(['title', 'body']))
		);

		return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) // Post $post
    {
		return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
