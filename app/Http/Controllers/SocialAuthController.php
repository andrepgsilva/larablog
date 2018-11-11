<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
        $user = $this->createOrGetUser(Socialite::driver($provider));
        auth()->login($user);
        return redirect('/');
    }

    private function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $user = User::whereProvider($providerName)
            ->whereProviderId($providerUser->getId())
            ->first();
        
        if (User::where('email', $providerUser->getEmail())->first()) {
            $user = User::where('email', $providerUser->getEmail())->first();
            return $user;
        }
        
        if (! $user) {
            $user = User::create([
                'username' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'email_verified_at' => date("Y-m-d H:i:s"),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
        }

        return $user;
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
