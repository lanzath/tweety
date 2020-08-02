<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show a specific user by name
     * @param  User  $user
     * @return View
     */
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }
}
