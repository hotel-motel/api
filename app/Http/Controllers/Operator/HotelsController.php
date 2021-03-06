<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\ApiController;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelsController extends Controller
{
    use ApiController;

    public function index(Request $request)
    {
        $ids=[];
        $permissions=$request->user()->getPermissionNames();
        foreach ($permissions as $permission){
            array_push($ids, str_replace('hotel.', '', $permission));
        }
        return $this->respond(Hotel::find($ids));
    }

    public function show(Hotel $hotel)
    {
        $hotel->rooms=$hotel->rooms()->withTrashed()->orderBy('floor')->get()->load('trips');
        $hotel->reserved_rooms=$hotel->rooms->filter(function ($room) {
            if( ! $room->isEmpty(now(), now())){
                return $room;
            }
        })->pluck('id')->toArray();
        return $this->respond($hotel);
    }
}
