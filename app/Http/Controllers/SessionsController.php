<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('destroy');
	}

    public function create()
    {
    	return view('sessions.create');
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }

    public function store()
    {
		$this->validate(request(), [
			'email' => 'required|email',
			'password' => 'required'
		],[
			'email.required' => 'An email is required.',
			'password.required' => 'A password is required.',
		]);

    	// Attempt to authenticate user.
    	if (!auth()->attempt(request(['email', 'password']))) {
	    	// If not authorized user, redirect back
			return back()->withErrors([
				'message' => 'Please check your credentials and try again.'
			]);
    	}

    	// Redirect to the home page.
		return redirect()->home();
    }
}
