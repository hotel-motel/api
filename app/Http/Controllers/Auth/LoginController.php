<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke(Login $request)
    {
        if ($token=auth()->attempt($request->only(['email', 'password'])))
            return response($token);
        return response('invalid password',422);
    }
}
