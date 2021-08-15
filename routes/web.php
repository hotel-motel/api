<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PaymentController;

require __DIR__.'/auth.php';

Route::view('/', 'home');

Route::group(['middleware'=>'auth'],function (){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
    Route::get('hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
    Route::post('hotels/{hotel}', [HotelController::class, 'get']);
    Route::get('rooms/{room}', [RoomController::class, 'reserve'])->name('rooms.reserve');
    Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
});

Route::get('trips/pay/verify', [PaymentController::class, 'verify']);
