<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        // redirect user to "login with Google account" page
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            // get user data from Google
            $user = Socialite::driver('google')->user();

            // find user in the database where the social id is the same with the id provided by Google
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser)  // if user found then do this
            {
                // Log the user in
                Auth::login($finduser);

                // redirect user to dashboard page
                return redirect('/');
            } else {
                // find by email
                $finduser = User::where('email', $user->email)->first();
                if ($finduser) Auth::login($finduser);
                else {
                    // if user not found then this is the first time he/she try to login with Google account
                    // create user data with their Google account data
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'social_id' => $user->id,
                        'social_type' => 'google',  // the social login is using google
                        'password' => bcrypt('my-google'),  // fill password by whatever pattern you choose
                    ]);
                    Auth::login($newUser);
                }
                
                return redirect('/');
            }
        } catch (Exception $e) {
            Log::info($e);
            return redirect('/login');
        }
    }
}
