<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class ProfileController extends Controller
{
    public function edit(User $user)
    { 
        return view('profile', compact('user'));  
    }

    public function update()
    {
        
    }
}
