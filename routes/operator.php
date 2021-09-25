<?php

use App\Http\Controllers\Operator\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\HotelsController;

Route::group(['prefix'=>'operator', 'middleware'=>['auth:api', 'role:operator']], function (){
    Route::apiResource('rooms', RoomController::class)->except('index');
    Route::apiResource('hotels', HotelsController::class)->only('index', 'show');
});
