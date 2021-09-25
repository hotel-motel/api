<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\HotelsController;

Route::group(['prefix'=>'operator', 'middleware'=>['auth:api', 'role:operator']], function (){
    Route::get('hotels', [HotelsController::class, 'index']);
});
