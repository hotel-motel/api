<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;

class ChangePasswordController extends Controller
{
    public function __invoke(ChangePassword $request)
    {
        if ( ! Hash::check($request->old_password, $request->user()->password)){
            return response('invalid password', 422);
        }
        $request->user()->update([
            'password'=>Hash::make($request->new_password)
        ]);
        return response()->noContent();
    }
}
