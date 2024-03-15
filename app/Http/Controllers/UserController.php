<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('registration');
    }
    public function store(Request $request){
        $formData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        User::create($formData);
        return redirect('/');
    }

    // user dashboard
    public function index(Request $request){

         // Retrieve user details from session
         $user = $request->session()->get('user');

         // Access user details
         $userId = $user->id;
         $userName = $user->name;
         $userEmail = $user->email;
 
         // Pass user details to the view
         return view('user-dashboard', compact('userName', 'userEmail', 'userId'));
    }
    public function show(Request $request){
        // Retrieve user details from session
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;
        $userName = $user->name;
        $userEmail = $user->email;
        $userPassword = $user->password;

        // Pass user details to the view
        return view('user-profile', compact('userName', 'userEmail', 'userId', 'userPassword'));
    }
    public function edit(Request $request)
    {
     // Retrieve user details from session
     $user = $request->session()->get('user');

     // Access user details
     $userId = $user->id;
     $userName = $user->name;
     $userEmail = $user->email;
     $userPassword = $user->password;

     // Pass user details to the view
     return view('user-edit', compact('userName', 'userEmail', 'userId', 'userPassword'));
    }
    public function update(Request $request){
        
        // Validate incoming request data
        $formData=$request->validate([
            'name' => 'required|string', // Ensure 'name' field is not empty
            'email' => 'required|email', // Example validation rule for 'email'
        ]);

        // Retrieve user details from session
        $user = $request->session()->get('user');
    
        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save(); // Save the updated user details to the database
    
        // Optionally, you can redirect the user to a different page after updating
        return redirect('/dashboard')->with('success', 'Profile updated successfully!');
}
    
    
}
