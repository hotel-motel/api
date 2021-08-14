<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PaymentController;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::group(['middleware'=>'auth'],function (){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
    Route::resource('hotels', HotelController::class)->only(['show']);
    Route::get('rooms/{room}', [RoomController::class, 'reserve'])->name('rooms.reserve');
    Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
});

Route::get('trips/pay/verify', [PaymentController::class, 'verify']);
