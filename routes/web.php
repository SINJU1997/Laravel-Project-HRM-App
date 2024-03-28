<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PunchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});


// Register
Route::get('/register',[UserController::class,'create']);
Route::post('/registration',[UserController::class,'store']);

// Login and logout
Route::get('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout']);

// User dashboard
Route::get('/dashboard',[UserController::class,'index']);
Route::get('/profile',[UserController::class,'show']);
Route::get('/edit',[UserController::class,'edit']);
Route::put('/update',[UserController::class,'update']);
Route::get('/apply-leave',[LeaveController::class,'leave']);
Route::post('/leave',[LeaveController::class,'applyLeave']);
Route::get('/status',[LeaveController::class,'leaveStatus']);
Route::post('/punch-in',[PunchController::class,'punchIn']);
Route::post('/punch-out',[PunchController::class,'punchOut']);

// Admin dashboard
Route::get('/admin-dashboard',[AdminController::class,'index']);
Route::get('/users-list',[AdminController::class,'show']);
Route::delete('/users/{user}', [AdminController::class,'destroy'])->name('users.destroy');
Route::get('/leave-entries', [AdminController::class,'leaveEntries']);
Route::put('/leave/{id}/update-status', [AdminController::class,'updateLeaveStatus'])->name('updateLeaveStatus');
Route::get('/attendance',[PunchController::class,'attendance']);
Route::get('/attendance-sheet',[PunchController::class,'attendanceSheet']);
