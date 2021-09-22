<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\HotelsController;

Route::group(['prefix'=>'operator', 'middleware'=>'auth:api'], function (){
    Route::get('hotels', [HotelsController::class, 'index']);
});
