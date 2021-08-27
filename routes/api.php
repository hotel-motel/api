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
Route::get('hotels/{hotel}', [HotelController::class, 'show']);
Route::get('cities/{city:name}', [CityController::class, 'show']);
Route::post('hotels/{hotel}', [HotelController::class, 'search_rooms']);
Route::get('trips/payment/verify', [PaymentController::class, 'verify']);
Route::get('cities/{city:name}/hotels', [CityController::class, 'hotels']);

Route::group(['middleware'=>'auth:api'], function (){
    Route::get('user', [UserController::class, 'show']);
    Route::get('trips', [TripController::class, 'index']);
    Route::get('trips/{trip}', [TripController::class, 'show']);
    Route::post('rooms/{room}', [RoomController::class, 'reserve']);
    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
    Route::post('change/password', ChangePasswordController::class);
});
