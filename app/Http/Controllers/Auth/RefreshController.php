<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RefreshController extends Controller
{
    use ApiController;

    public function __invoke(Request $request)
    {
        return $this->respond(auth()->refresh());
    }
}
