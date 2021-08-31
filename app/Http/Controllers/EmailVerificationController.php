<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailVerification;

class EmailVerificationController extends Controller
{
    public function __invoke(EmailVerification $emailVerification)
    {
        $emailVerification->user->markEmailAsVerified();
        $emailVerification->delete();
        return view('verification.email.success');
    }
}
