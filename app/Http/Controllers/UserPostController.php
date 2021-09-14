<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //
    public function index(User $user)
    {
        # code...
        return view('users.posts', [
            'user' => $user,

        ]);
    }
}
