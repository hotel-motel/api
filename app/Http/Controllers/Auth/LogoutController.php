<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use ApiController;

    public function __invoke(Request $request)
    {
        auth()->logout();
        return $this->respondNoContent();
    }
}
