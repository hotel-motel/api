<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Hotel $hotel)
    {
        $hotel->load('city');
        $reserved=[];
        if ($request->has('start') && $request->has('end')){
            $hotel->load('rooms');
            $tripDays=CarbonPeriod::create($request->start, $request->end);
            $reserved=$hotel->rooms->filter(function ($room) use($request, $tripDays) {
                $tripsInDate=$room->trips->filter(function ($trip) use ($request, $tripDays){
                    foreach ($tripDays as $day){
                        if ($day>=$trip->start && $day<=$trip->end){
                            return $trip;
                        }
                    }
                });
                if ($tripsInDate->count()>0){
                    return $room;
                }
            })->pluck('id')->toArray();
        }
        $trip_duration=Carbon::parse(request()->input('end'))->diffInDays(request()->input('start'));
        return view('hotel.show', ['hotel'=>$hotel, 'reserved'=>$reserved, 'trip_duration'=>$trip_duration]);
    }
}
