<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $fetchUser = User::where('social_id' , $user->id)->first();

        if ($fetchUser)
        {
            Auth::login($fetchUser);
            return redirect('/');
        } else {
           $newUser =  User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id'   => $user->id,
                'social_type' => 'google',
                'password'   => Hash::make('google-password'),
                'thumbnail'  => $user->avatar,
            ]);
            Auth::login($newUser);
            return  redirect('/');
        }
    }
}
