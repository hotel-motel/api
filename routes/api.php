<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChangePasswordController;

require 'auth.php';

Route::get('cities/', [CityController::class, 'index']);
Route::post('hotels/{hotel}', [HotelController::class, 'search_rooms']);
Route::get('cities/{city:name}/hotels', [CityController::class, 'hotels']);
Route::get('cities/{city:name}', [CityController::class, 'show']);
Route::get('hotels/{hotel}', [HotelController::class, 'show']);

Route::group(['middleware'=>'api:auth'], function (){
    Route::get('user', [UserController::class, 'show']);
    Route::get('trips', [TripController::class, 'index']);
    Route::get('trips/{trip}', [TripController::class, 'show']);
    Route::get('rooms/{room}', [RoomController::class, 'reserve']);
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
    Route::post('change/password', ChangePasswordController::class);
    Route::get('trips/pay/verify', [PaymentController::class, 'verify']);
});
