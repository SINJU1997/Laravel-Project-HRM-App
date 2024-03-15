<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, retrieve the authenticated user
            $user = Auth::user();

            // Store user details in session
                $request->session()->put('user', $user);
    
            // Check if the user is admin
            if ($user->email === 'admin@gmail.com' || $user->email === 'admin2@gmail.com') {
                // Redirect to admin dashboard
                return redirect('/admin-dashboard');
            } else {
                // Redirect to regular user dashboard
                return redirect('/dashboard');
            }
        }
    
        // If authentication fails, redirect back with error message
        return redirect('/')->with('error', 'Invalid credentials.');
    }
    
    
    public function logout(Request $request)
    {
        Auth::logout(); // Logout the currently authenticated user
        $request->session()->forget('user'); // Remove user details from session
        return redirect('/'); // Redirect to the homepage or any other desired page
    }
}
