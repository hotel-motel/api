<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordResetCodeVerify;
use App\Http\Requests\PasswordReset as PasswordResetRequest;
use App\Http\Requests\PasswordResetNotify as PasswordResetNotifyRequest;

class PasswordResetController extends Controller
{
    use ApiController;

    public function notify(PasswordResetNotifyRequest $request)
    {
        $user=User::where('email', $request->email)->first();
        $passwordReset=PasswordReset::generate($user);
        //TODO: send email
        return $this->respondNoContent();
    }

    public function codeVerify(PasswordResetCodeVerify $request)
    {
        return $this->respondNoContent();
    }

    public function reset(PasswordResetRequest $request)
    {
        $passwordReset=PasswordReset::where('token', $request->token)->first();
        $passwordReset->user->update([
            'password'=>Hash::make($request->password)
        ]);
        $passwordReset->delete();
        return $this->respondNoContent();
    }
}
