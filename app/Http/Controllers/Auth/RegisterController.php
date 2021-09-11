<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);


        // Store the user into the database
        // Sign in the user
        // redirect to the required page
    }
}
