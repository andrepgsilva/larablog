<?php

namespace App\Libraries;

class Profile 
{
    public static function saveAvatar($validatedAvatar, $userAvatar) 
    {
        $avatarName = $validatedAvatar->getClientOriginalName() === $userAvatar;
        if (! $avatarName) {
            $avatarName = auth()->id() . '-avatar';
            try {
                $validatedAvatar->storeAs('/img/avatars', $avatarName, 'public');
                return $avatarName;
            } catch(\Exception $error) {
                report($error);
                return false;
            }
        }
        return $validatedAvatar;
    }
}