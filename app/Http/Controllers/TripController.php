<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrip;
use App\Models\Room;
use App\Models\Trip;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->trips()->with('room.hotel.city')->get();
    }

    public function show(Trip $trip)
    {
        $this->authorize('view', $trip);
        $trip->load('room.hotel', 'passengers', 'payment');
        return response($trip);
    }

    public function store(Room $room, StoreTrip $request)
    {
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
