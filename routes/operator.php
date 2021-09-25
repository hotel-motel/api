<?php

use App\Http\Controllers\Operator\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\HotelsController;

Route::group(['prefix'=>'operator', 'middleware'=>['auth:api', 'role:operator']], function (){
    // TODO: set some middleware to operator access just his/her hotels(not access to other hotels too)
    Route::apiResource('hotels', HotelsController::class)->only('index', 'show');

    Route::apiResource('rooms', RoomController::class)->only('show', 'update', 'destroy');

    Route::group(['prefix'=>'hotels/{hotel}'], function (){
        Route::apiResource('rooms', RoomController::class)->only('store');
    });
});
