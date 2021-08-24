<?php

use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


Route::group(['prefix'=>'auth'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::post('register', RegisterController::class);
    });
    Route::group(['middleware'=>'api'], function (){
        Route::get('user', UserController::class);
        Route::post('login', LoginController::class);
        Route::post('logout', LogoutController::class);
        Route::post('refresh', RefreshController::class);
    });
});
