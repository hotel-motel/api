<?php

namespace App\Http\Controllers\Operator;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelsController extends Controller
{
    public function index(Request $request)
    {
        $ids=[];
        $permissions=$request->user()->getPermissionNames();
        foreach ($permissions as $permission){
            array_push($ids, str_replace('hotel.', '', $permission));
        }
        return Hotel::find($ids);
    }
}
