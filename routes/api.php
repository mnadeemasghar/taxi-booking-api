<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StopController;
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
});