<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Register $request)
    {
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        //TODO: create email_verification row in db
        //TODO: send email_verification
        return response()->noContent();
    }
}
