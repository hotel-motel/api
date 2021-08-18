<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Trip;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function show(Request $request,Trip $trip)
    {
        //TODO: check user can see trip or not
        $trip->load('room.hotel', 'passengers', 'payment');
        return view('trip.show', compact('trip'));
    }

    public function store(Room $room, Request $request)
    {
        //TODO : customize error message
        Validator::make($request->all(), [
            'start'=>'required|date',
            'passengers'=>'required|array',
            'end'=>'required|date|after:start',
            'passengers.*.last_name'=>'required',
            'passengers.*.first_name'=>'required',
            'passengers.*.national_code'=>'required|size:10'
        ])->validate();
        if (sizeof($request->passengers)>$room->max_capacity){
            return response(['errors'=>'Passenger count is more than room capacity'], 422);
        }
        $tripDays=CarbonPeriod::create($request->start, $request->end);
        $tripsInDate=$room->trips->filter(function ($trip) use ($request, $tripDays){
            foreach ($tripDays as $day){
                if ($day>=$trip->start && $day<=$trip->end){
                    return $trip;
                }
            }
        });
        if ($tripsInDate->count()>0){
            return response(['errors'=>'Reserved for this period'], 422);
        }
        $trip=auth()->user()->trips()->create([
            'start'=>$request->start,
            'end'=>$request->end,
            'room_id'=>$room->id,
            'amount'=>$room->price*$tripDays->count()
        ]);
        $trip->passengers()->createMany($request->passengers);
        return $trip->id;
    }
}
