<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    public function update(Request $request)
    {
        $path = $request->file('avatar')->store('avatars');
        return $path;
    }
}
