<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationsController extends Controller
{
    public function create() {
    	return view('registrations.create');
    }

    public function store() {
    	
    	// validate form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	// store data
    	// $user = User::create(request(['name', 'email', 'password']));

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	// sign them in
    	auth()->login($user);

    	// return link
    	// return redirect('/')->with('status', 'New user added!');
    	return redirect()->home()->with('status', 'New user added!');
    }
}
