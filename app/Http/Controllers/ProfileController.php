<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function edit(User $user)
    { 
        return view('profile', compact('user'));  
    }

    public function update(User $user)
    {
      $validated = request()->validate([
          'username' => 'required|max:25|min:3',
          'password' => 'required|min:6|max:20'
      ]);
      $validated['password'] = Hash::make($validated['password']);
      $user->update($validated);
      return redirect()->route('home');
    }
}
