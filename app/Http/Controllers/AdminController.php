<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leave;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){

        // Retrieve user details from session
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;
        $userName = $user->name;
        $userEmail = $user->email;

        // Pass user details to the view
        return view('admin-dashboard', compact('userName', 'userEmail'));
    }
    public function show() {
        // Retrieve all users except the one with email "admin@gmail.com"
        $users = User::whereNotIn('email', ['admin@gmail.com', 'admin2@gmail.com'])->get();
    
        $data = [
            'users' => $users
        ];
    
        return view('users-list', $data);
    }
    
    public function destroy(User $user)
    {
        // Delete the user from the database
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function leaveEntries(){
        $leaveData= [
            'leaves' => Leave::all()
        ];

        return view('leave-entries', $leaveData);

    }
    
    
    public function updateLeaveStatus(Request $request, $id)
    {
        // Find the leave record by ID
        $leave = Leave::findOrFail($id);

        // Update the status based on the submitted value
        $leave->status = $request->status;

        // Save the changes
        $leave->save();

        // Redirect back or wherever you want after the update
        return redirect()->back()->with('success', 'Leave status updated successfully.');
    }
}
