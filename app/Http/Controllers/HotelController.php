<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Http\Requests\SearchRoomRequest;

class HotelController extends Controller
{
    public function search_rooms(SearchRoomRequest $request, Hotel $hotel)
    {
        $response['rooms']=$hotel->rooms;
        $response['reserved']=$hotel->rooms->filter(function ($room) use($request) {
            if( ! $room->isEmpty($request->start, $request->end)){
                return $room;
            }
        })->pluck('id')->toArray();
        return $response;
    }
    public function show(Hotel $hotel)
    {
        return view('hotel.show', ['hotel'=>$hotel]);
    }
}
