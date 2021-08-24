<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
