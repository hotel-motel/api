<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiController;

    public function __invoke(Request $request)
    {
        $user=auth()->user()->load('roles');
        return $this->respond($user);
    }
}
