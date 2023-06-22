<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api s 
/** ---------Register and Login ----------- */
Route::controller(RegisterController::class)->group(function()
{
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('users', 'login')->name('index');

});

/** -----------Users --------------------- */
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users',[RegisterController::class,'index'])->name('index');
});

Route::middleware('auth:sanctum')->controller(RegisterController::class)->group(function() {
    Route::get('/users','index')->name('index');
});
Route::get('attendance/start', [AttendanceController::class, 'start']);
Route::get('attendance/end', [AttendanceController::class, 'end']);
Route::get('attendance/calculate', [AttendanceController::class, 'calculate']);
Route::get('attendance/check-working-hours', [AttendanceController::class, 'checkWorkingHours']);
