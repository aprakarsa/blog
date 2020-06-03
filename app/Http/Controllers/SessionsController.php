<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct() {
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function create() {
    	return view('sessions.create');
    }

    public function store() {
    	// attempt to authenticate the user
    	if ( ! auth()->attempt(request(['email', 'password'])) ) {

    	// if ( ! auth()->attempt([ 'email' => request('$email'), 'password' => request('$password') ]) ) {

    		// dd( auth()->attempt(request(['email', 'password'])) );

    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}

    	// if not redirect back

    	// if so, sign them in

    	// redirect to the home page again
    	return redirect()->home()->with('status', 'Logged in.. Welcome..');
    }

    public function destroy() {
    	auth()->logout();

    	return redirect()->home()->with('status', 'logged out..');
    }
}
