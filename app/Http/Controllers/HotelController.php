<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
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
        $hotel->load('city', 'rooms');
        $reserved=[];
        if ($request->has('start')){
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
        return view('hotel.show', ['hotel'=>$hotel, 'reserved'=>$reserved]);
    }
}
