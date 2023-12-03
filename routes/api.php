<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/otp_check_register',[AuthController::class,'otp_check_register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/forgot_password',[AuthController::class,'forgot_password']);
Route::post('/forgot_password_otp_confirm',[AuthController::class,'forgot_password_otp_confirm']);