<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Http\Requests\SearchRoomRequest;

class HotelController extends Controller
{
    public function show(SearchRoomRequest $request, Hotel $hotel)
    {
        $hotel->load('city');
        $reserved=[];
        if ($request->has('start')){
            $hotel->load('rooms');
            $reserved=$hotel->rooms->filter(function ($room) use($request) {
                if( ! $room->isEmpty($request->start, $request->end)){
                    return $room;
                }
            })->pluck('id')->toArray();
        }
        // Note: we add 1 to $trip_duration because of start date should reserved and start day ignored in diffInDays function
        $trip_duration=Carbon::parse(request()->input('end'))->diffInDays(request()->input('start'))+1;
        return view('hotel.show', ['hotel'=>$hotel, 'reserved'=>$reserved, 'trip_duration'=>$trip_duration]);
    }
}
