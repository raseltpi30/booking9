<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // Redirect authenticated users away from the login page
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check if the user is an admin
            if (Auth::user()->is_admin == 1) {
                $notification = array('message' => 'Login Successfully!','alert-type' => 'success');
                return redirect()->route('admin.home')->with($notification); // Redirect to intended page after login
            } else {
                Auth::logout(); // Log out the user if they are not an admin
                return back()->withErrors([
                    'email' => 'You do not have admin access.',
                ]);
            }
        }

        // Return back with error if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $notification = array('message' => 'Logout Successfully!','alert-type' => 'success');
        return redirect()->route('login')->with($notification);
    }
}
