<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Provider;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = $this->processUser(Socialite::driver($provider));
        auth()->login($user);
        return redirect('/home');
    }

    //Execute Create/Get user process
    private function processUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);
        $user = $this->verifyUser($providerName, $providerUser);

        if (empty($user)) {
            return $this->createUser($providerUser, $providerName);
        }
        
        return $user;
    }

    // Verify user existence
    private function verifyUser($providerName, $providerUser)
    {
        return User::whereEmail($providerUser->getEmail())->first();
    }
 
    private function createUser($providerUser, $providerName)
    {
        return User::create([
            'username' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'email_verified_at' => date("Y-m-d H:i:s"),
            'provider_id' => $providerUser->getId(),
            'provider' => $providerName
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
