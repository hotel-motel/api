<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Register;
use App\Mail\EmailVerify;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use ApiController;

    public function __invoke(Register $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $emailVerification=EmailVerification::create([
            'email'=>$user->email,
            'token'=>Str::random()
        ]);
        Mail::to($user->email)->send(new EmailVerify($emailVerification->token));
        return $this->respondNoContent();
    }
}
