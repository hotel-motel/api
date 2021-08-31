<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EmailVerificationController;

Route::get('trips/{trip}/pay', [PaymentController::class, 'pay']);
Route::get('email/verify/{email_verification:token}', EmailVerificationController::class);
