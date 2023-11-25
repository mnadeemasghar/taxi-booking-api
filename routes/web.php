<?php

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
Route::get('/booking-requests',[BookingRequestController::class,'index'])->name('BookingRequest.index');
Route::get('/create-booking-request',[BookingRequestController::class,'create'])->name('BookingRequest.create');
Route::get('/edit-booking-request/{id}',[BookingRequestController::class,'edit'])->name('BookingRequest.edit');
Route::post('/update-booking-request/{id}',[BookingRequestController::class,'update'])->name('BookingRequest.update');
Route::post('/destroy-booking-request/{id}',[BookingRequestController::class,'destroy'])->name('BookingRequest.destroy');
Route::post('/store-booking-request',[BookingRequestController::class,'store'])->name('BookingRequest.store');

Route::get('/search-booking-request',[BookingRequestController::class,'search'])->name('BookingRequest.search');
Route::post('/search-result-booking-request',[BookingRequestController::class,'search_result'])->name('BookingRequest.search_result');
