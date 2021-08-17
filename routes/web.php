<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\PaymentController;

require __DIR__.'/auth.php';

Route::view('/', 'home');

Route::group(['middleware'=>'auth'],function (){
    Route::post('hotels/{hotel}', [HotelController::class, 'get']);
    Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('trips/pay/verify', [PaymentController::class, 'verify']);
    Route::get('cities/', [CityController::class, 'index'])->name('cities.index');
    Route::get('cities/{city:name}', [CityController::class, 'show'])->name('cities.show');
    Route::get('cities/{city:name}/hotels', [CityController::class, 'hotels'])->name('cities.hotels');
    Route::get('hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
    Route::get('rooms/{room}', [RoomController::class, 'reserve'])->name('rooms.reserve');
});
