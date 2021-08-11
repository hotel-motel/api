<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::group(['middleware'=>'auth'],function (){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('hotels', HotelController::class)->only(['show']);
});

