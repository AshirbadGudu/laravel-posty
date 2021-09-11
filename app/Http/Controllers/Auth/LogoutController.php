<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index()
    {
        // Logout from the application
        auth()->logout();
        // Redirect to the login page
        return redirect()->route('login');
    }
}
