<?php

use App\Http\Controllers\API\AuthController;
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


Route::post('/register',[AuthController::class,'register']);
Route::post('/otp_check_register',[AuthController::class,'otp_check_register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/forgot_password',[AuthController::class,'forgot_password']);
Route::post('/forgot_password_otp_confirm',[AuthController::class,'forgot_password_otp_confirm']);

Route::middleware('auth:api')->group(function(){
    Route::post('/stop/store',[StopController::class,'store']);
    Route::post('/stop',[StopController::class,'index']);
    Route::post('/stop/update',[StopController::class,'update']);
    Route::post('/stop/destroy',[StopController::class,'destroy']);
    
    Route::post('/profile/update',[AuthController::class,'update']);

    Route::post('/vehicle/update',[VehicleController::class,'update']);
    Route::post('/vehicle',[VehicleController::class,'index']);

    // TODO: 
    // search for stops by pick and drop lat,lng
    // passenger sends booking request to the stop owner - timestamp entry in request_timestamps table
    // stop owner accepts the request - timestamp entry in request_timestamps table
    // stop owner reaches at the stop - timestamp entry in request_timestamps table
    // stop owner pick the passenger - timestamp entry in request_timestamps table
    // passenger request to change the drop stop - timestamp entry in request_timestamps table
    // stop owner change the drop stop - timestamp entry in request_timestamps table
    // stop owner drop passenger at drop stop - timestamp entry in request_timestamps table

});