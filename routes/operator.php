<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\RoomController;
use App\Http\Controllers\Operator\HotelsController;

Route::group(['prefix'=>'operator', 'middleware'=>['auth:api', 'role:operator']], function (){

    Route::apiResource('hotels', HotelsController::class)->only('index');

    Route::group(['middleware'=>'operatorHasAccessHotel'],  function(){
        Route::apiResource('hotels', HotelsController::class)->only('show');
        Route::group(['prefix'=>'hotels/{hotel}'], function (){
            Route::apiResource('rooms', RoomController::class)->only('store');
        });
    });
    Route::group(['middleware'=>'operatorHasAccessRoom'],  function(){
        Route::apiResource('rooms', RoomController::class)->only('show', 'update', 'destroy');
    });
});
