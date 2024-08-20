<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        // ambil google_id untuk registrasi google
        $registeredUser = User::where("google_id", $socialUser->id)->first();

        // cek jika user belum ada
        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make('123'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/dashboard');
        }

        // jika user sudah ada arahkan ke halaman dashboard
        Auth::login($registeredUser);

        return redirect('/dashboard');
    }
}
