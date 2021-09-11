<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validate the request parameters
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required",
        ]);
        // Sign in the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            # If attempt for login is failed then go back with some error message
            return back()->with('status', 'Invalid login attempt!');
        }
        // Redirect the user 
        return redirect()->route('dashboard');
    }
}
