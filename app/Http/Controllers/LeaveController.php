<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function leave(Request $request){
        // Retrieve user details from session
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;
        $userName = $user->name;
        $userEmail = $user->email;

        // Pass user details to the view
        return view('leave-apply', compact('userName', 'userId'));
    }
    public function applyLeave(Request $request){
        $leaveData=$request->validate([
            'userId'=>'required',
            'name'=>'required',
            'reason'=>'required',
            'from_date'=>'required',
            'to_date'=>'required'
        ]);
        Leave::create($leaveData);
        return redirect('/dashboard')->with('success', 'Leave applied successfully!');
    }
    public function leaveStatus(Request $request){
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;
        $userName = $user->name;
        $userEmail = $user->email;

        $leaves = Leave::where('userId', $userId)->get();
        // Pass user details to the view
        return view('leave-status', compact('userName', 'userId', 'leaves'));
    }
}
