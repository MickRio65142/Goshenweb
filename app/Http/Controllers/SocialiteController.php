<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google authentication failed.');
        }

        $user = User::where('provider', 'google')
            ->where('provider_id', $googleUser->getId())
            ->first();

        if ($user) {
            Auth::login($user);
            return $this->redirectToPanel();
        }

        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            $existingUser->update([
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'provider_token' => $googleUser->token,
                'avatar_url' => $existingUser->avatar_url ?? $googleUser->getAvatar(),
            ]);

            Auth::login($existingUser);
            return $this->redirectToPanel();
        }

        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(str()->random(16)),
            'provider' => 'google',
            'provider_id' => $googleUser->getId(),
            'provider_token' => $googleUser->token,
            'avatar_url' => $googleUser->getAvatar(),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);

        Auth::login($user);
        return $this->redirectToPanel();
    }

    private function redirectToPanel()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        return redirect('/student');
    }
}
