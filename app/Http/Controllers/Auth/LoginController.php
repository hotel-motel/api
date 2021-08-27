<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use ApiController;

    public function __invoke(Login $request)
    {
        if ($token=auth()->attempt($request->only(['email', 'password'])))
            return response($token);
        return $this->setStatusCode(422)->respondWithError('password', 'Invalid password');
    }
}
