<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        // Check if the user with Facebook ID exists in your database.
        $existingUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($existingUser) {
            // Log in the existing user
            auth()->login($existingUser);
        } else {
            // Create a new user
            $newUser = new User();
            $newUser->name = $facebookUser->name;
            $newUser->email = $facebookUser->email;
            $newUser->facebook_id = $facebookUser->id;
            $newUser->password = bcrypt(Str::random(8)); // Generate a random password
            $newUser->role = 'user';
            $newUser->save();

            // Log in the new user
            auth()->login($newUser);
        }

        return redirect()->route('home');
    }
}
