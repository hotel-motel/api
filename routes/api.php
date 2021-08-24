<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangePasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('hotels/{hotel}', [HotelController::class, 'search_rooms']);
Route::get('cities/{city:name}/hotels', [CityController::class, 'hotels'])->name('cities.hotels');

TODO:
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', LoginController::class);
    Route::post('logout', LogoutController::class);
//    Route::post('refresh', 'AuthController@refresh');
    Route::get('user', \App\Http\Controllers\Auth\UserController::class);
});

//Route::group(['middleware'=>'auth:sanctum'], function (){
//    Route::get('user', [UserController::class, 'show']);
//    Route::post('change/password', ChangePasswordController::class);
//    Route::post('rooms/{room}/trips', [TripController::class, 'store']);
//});
