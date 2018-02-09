<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	// Validate the form.
		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

    	// Create & save the user.
    	$user = User::create(request(['name', 'email', 'password']));
    	dd($user->password);
    	/*$user = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
    	]);*/

    	// Sign user in.
    	auth()->login($user);

		\Mail::to($user)->send(new Email);

    	// Redirect to home page.
		return redirect()->home();
    }
}
