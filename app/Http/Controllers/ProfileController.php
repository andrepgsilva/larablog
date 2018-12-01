<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function edit(User $user)
    {
        abort_unless(Gate::allows('update-user', request()), '403');
        return view('profile', compact('user'));
    }

    public function update(User $user, ProfileUpdateRequest $request)
    {
        $validated = $request->validated();
        dd($validated['avatar']->storeAs('avatars', auth()->id() . '-avatar', 'public/img/'));
        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $user->update($validated);
        return redirect()->route('home');
    }
}
