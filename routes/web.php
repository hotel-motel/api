<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChangePasswordController;

require __DIR__.'/auth.php';

Route::view('/', 'home');
Route::get('cities/', [CityController::class, 'index'])->name('cities.index');
Route::get('cities/{city:name}', [CityController::class, 'show'])->name('cities.show');
Route::get('hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');

Route::group(['middleware'=>'auth'],function (){
    Route::get('trips', [TripController::class, 'index']);
    Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('trips/pay/verify', [PaymentController::class, 'verify']);
    Route::get('rooms/{room}', [RoomController::class, 'reserve'])->name('rooms.reserve');
    Route::get('trips/{trip}', [TripController::class, 'show']);
    Route::get('user', [UserController::class, 'show']);
    Route::post('change/password', ChangePasswordController::class);
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
});
