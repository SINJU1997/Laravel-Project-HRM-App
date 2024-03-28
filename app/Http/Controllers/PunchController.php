<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Punch;
use Illuminate\Http\Request;

class PunchController extends Controller
{
    public function punchIn(Request $request)
    {
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;
        $userName = $user->name;

        $currentDateTime = Carbon::now();
        $currentDate = $currentDateTime->toDateString();
        $currentTime = $currentDateTime->format('H:i:s');

        // Check if user has already punched in for today
        $existingPunch = Punch::where('userId', $userId)
            ->whereDate('date', $currentDate)
            ->first();

        if ($existingPunch) {
            return response()->json([
                'message' => "You have already punched in for today."
            ], 400);
        }

        $punch = new Punch();
        $punch->name = $userName;
        $punch->userId = $userId;
        $punch->date = $currentDate;
        $punch->punch_in = $currentTime;
        $punch->save();

        // Set session variable to indicate that the user has punched in

        // return redirect('/dashboard');
        return response()->json([
            'message' => "Punch in success",
            'punch_in' => $currentTime
        ], 200);
    }


    public function punchOut(Request $request)
    {
        $user = $request->session()->get('user');

        // Access user details
        $userId = $user->id;

        // Find the punch record for the user where punch_out is NULL
        $punch = Punch::where('userId', $userId)
            ->whereNull('punch_out')
            ->latest() // Get the latest punch record
            ->first();

        // Check if a punch record is found
        if ($punch) {
            $currentDateTime = Carbon::now();
            $currentTime = $currentDateTime->format('H:i:s');

            // Update the punch_out field with the current time
            $punch->punch_out = $currentTime;
            $punch->save();

            return response()->json([
                'message' => "Punch out success"
            ], 200);
        } else {
            // If no punch record found, return an error message
            return response()->json([
                'error' => "No punch in record found for the user"
            ], 400);
        }
    }

    public function attendance(Request $request)
    {
        // return view('attendance-sheet');
        $date = $request->input('date');
        $attendance = Punch::whereDate('date', $date)->get();
        // Assuming you have a blade view to render attendance details, otherwise, you can directly return JSON.
        return view('attendance-sheet', compact('attendance'));
    }
    public function attendanceSheet(Request $request)
    {
        $date = $request->input('date');
        $attendance = Punch::whereDate('date', $date)->get();

        // Check if there are no records
        if ($attendance->isEmpty()) {
            return "<p style='color: red; font-size: larger; margin-top:80px;'>No one has punched in or punched out on the selected date.</p>";
        }

        // Render the attendance details into HTML
        $html = '';
        foreach ($attendance as $punch) {
            $html .= '<p>' . $punch->name . ' - ' . $punch->punch_in . ' - ' . $punch->punch_out . '</p>';
        }

        return $html;
    }
}
