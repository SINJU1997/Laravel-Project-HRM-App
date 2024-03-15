<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Punch;
use Illuminate\Http\Request;

class PunchController extends Controller
{
    public function punchIn(Request $request){
        $user = $request->session()->get('user');
    
        // Access user details
        $userId = $user->id;
        $userName = $user->name;
    
        $currentDateTime = Carbon::now();
        $currentDate = $currentDateTime->toDateString();
        $currentTime = $currentDateTime->format('H:i:s');
    
        $punch = new Punch();
        $punch->name = $userName;
        $punch->userId = $userId;
        $punch->date = $currentDate;
        $punch->punch_in = $currentTime;
        $punch->save();
    
        // Set session variable to indicate that the user has punched in
    
        return redirect('/dashboard');
    }
    
}
