<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRoomRequest;
use App\Models\Hotel;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HotelController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
