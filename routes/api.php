<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\StopController;
use App\Http\Controllers\API\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::post('otp_check_register','otp_check_register');
    Route::post('login','login');
    Route::post('forgot_password','forgot_password');
    Route::post('forgot_password_otp_confirm','forgot_password_otp_confirm');
});

Route::middleware('auth:api')->group(function(){
    Route::controller(StopController::class)->group(function(){
        Route::post('stop/store','store');
        Route::post('stop','index');
        Route::post('stop/update','update');
        Route::post('stop/destroy','destroy');
    });
    
    Route::controller(AuthController::class)->group(function(){
        Route::post('profile/update','update');
    });

    Route::controller(VehicleController::class)->group(function(){
        Route::post('vehicle/update','update');
        Route::post('vehicle','index');
    });
    
    Route::controller(BookingController::class)->group(function(){
        Route::post("booking/request/create",'create');
        Route::post("booking/request/accept",'accept');
        Route::post("booking/request/reach",'reach');
        Route::post("booking/request/pick",'pick');
        Route::post("booking/request/drop",'drop');
    });

    // passenger request to change the drop stop - timestamp entry in request_timestamps table
    // Route::post("/booking/request/change_request",[BookingController::class,'change_request']);
    
    // stop owner change the drop stop - timestamp entry in request_timestamps table
    // Route::post("/booking/request/drop",[BookingController::class,'drop']);
});

// TODO: 
// search for stops by pick and drop lat,lng
Route::controller(BookingController::class)->group(function(){
    Route::post("/booking/request/search", 'search');
});