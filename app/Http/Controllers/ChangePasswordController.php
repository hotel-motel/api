<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'old_password'=>'required|min:6',
            'new_password'=>'required|min:6|different:old_password'
        ]);
        if ($validator->fails()){
            return response($validator->errors(), 422);
        }
        if ( ! Hash::check($request->old_password, $request->user()->password)){
            return response('invalid password', 422);
        }
        $request->user()->update([
            'password'=>Hash::make($request->new_password)
        ]);
        return response()->noContent();
    }
}
