<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingRequestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BookingRequestController::class,'home'])->name('BookingRequest.home');
Route::get('/booking-requests',[BookingRequestController::class,'index'])->name('BookingRequest.index')->middleware('auth');
Route::get('/create-booking-request',[BookingRequestController::class,'create'])->name('BookingRequest.create');
Route::get('/edit-booking-request/{id}',[BookingRequestController::class,'edit'])->name('BookingRequest.edit');
Route::post('/update-booking-request/{id}',[BookingRequestController::class,'update'])->name('BookingRequest.update')->middleware('auth');
Route::post('/destroy-booking-request/{id}',[BookingRequestController::class,'destroy'])->name('BookingRequest.destroy')->middleware('auth');
Route::post('/store-booking-request',[BookingRequestController::class,'store'])->name('BookingRequest.store')->middleware('auth');

Route::get('/search-booking-request',[BookingRequestController::class,'search'])->name('BookingRequest.search');
Route::post('/search-result-booking-request',[BookingRequestController::class,'search_result'])->name('BookingRequest.search_result');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login/check',[AuthController::class,'login_check'])->name('login.check');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/register/store',[AuthController::class,'store'])->name('register.store');
