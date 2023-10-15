<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // App\Http\Controllers\Auth\LoginController.php

    // App\Http\Controllers\Auth\LoginController.php

    public function login(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login the user
        $user = Auth::attempt($request->only('email', 'password'));

        if ($user) {
            // Set the session
            Session::put('user', $user);

            // Redirect to the home page
            return redirect()->intended('/home');
        }

        // Return an error message
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }



    public function logout(Request $request)
    {
        Auth::logout();
        // Flush the session
        Session::flush();
        return redirect('/');
    }
}
