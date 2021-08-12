<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::group(['middleware'=>'auth'],function (){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::resource('hotels', HotelController::class)->only(['show']);
    Route::get('rooms/{room}', [RoomController::class, 'reserve'])->name('rooms.reserve');
});

