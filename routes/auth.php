<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PasswordResetController;


Route::group(['prefix'=>'auth'], function(){
    Route::group(['middleware'=>'guest'], function(){
        Route::post('register', RegisterController::class);
        Route::post('password/reset', [PasswordResetController::class, 'notify']);
        Route::post('password/reset/code/verify', [PasswordResetController::class, 'codeVerify']);
        Route::post('password/reset/password/update', [PasswordResetController::class, 'reset']);
    });
    Route::group(['middleware'=>'api'], function (){
        Route::get('user', UserController::class);
        Route::post('login', LoginController::class);
        Route::post('logout', LogoutController::class);
        Route::post('refresh', RefreshController::class);
    });
});
