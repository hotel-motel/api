<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;

class ChangePasswordController extends Controller
{
    use ApiController;

    public function __invoke(ChangePassword $request)
    {
        if ( ! Hash::check($request->old_password, $request->user()->password)){
            return $this->setStatusCode(422)->respondWithError('old_password', 'Invalid old password');
        }
        $request->user()->update([
            'password'=>Hash::make($request->new_password)
        ]);
        return $this->respondNoContent();
    }
}
