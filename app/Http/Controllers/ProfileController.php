<?php

namespace App\Http\Controllers;

use App\User;
use App\Libraries\Profile;
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
        if (isset($validated['avatar'])) {
            $validated['avatar'] = Profile::saveAvatar($validated['avatar'], $user->avatar);
            if (! $validated['avatar']) {
                return back()->withErrors('Could not save your post. Try Again Later.');
            }
        }
        $password = $validated['password'];
        $password = $password ? Hash::make($password) : $password; 
        $user->update($validated);
        return redirect()->route('home');
    }
}
