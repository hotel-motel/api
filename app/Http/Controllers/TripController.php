<?php

namespace App\Http\Controllers;

use App\Models\passenger;
use App\Models\Room;
use App\Models\Trip;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Room $room, Request $request)
    {
        //check param must be exist
        $tripDays=CarbonPeriod::create($request->start, $request->end);
        $tripsInDate=$room->trips->filter(function ($trip) use ($request, $tripDays){
            foreach ($tripDays as $day){
                if ($day>=$trip->start && $day<=$trip->end){
                    return $trip;
                }
            }
        });
        if ($tripsInDate->count()>0){
            return abort(403, 'can not reserve');
        }
        $trip=Trip::create([
            'start'=>$request->start,
            'end'=>$request->end,
            'room_id'=>$room->id,
            'creator_id'=>auth()->id()
        ]);
        foreach ($request->passengers as $passenger){
            passenger::create([
                'first_name'=>$passenger['first_name'],
                'last_name'=>$passenger['last_name'],
                'national_code'=>$passenger['national_code'],
                'trip_id'=>$trip->id
            ]);
        }
        return $request;
    }
}
