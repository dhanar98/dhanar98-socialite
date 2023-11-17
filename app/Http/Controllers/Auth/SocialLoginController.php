<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider_name)
    {
        return Socialite::driver($provider_name)->redirect();
    }

    public function handleProviderCallback($provider_name)
    {
        $socialUser = Socialite::driver($provider_name)->user();

        Log::debug('LoginData'.json_encode($socialUser,128));
        
        $user = User::updateOrCreate([
            'email' => $socialUser->email,
        ], [
            'name' => $socialUser->name,
            'provider_id' => $socialUser->id,
            'provider_name' => $provider_name,
            'password'  => bcrypt('password')
        ]);

        Auth::login($user,true);

        return redirect(RouteServiceProvider::HOME);
    }
}
