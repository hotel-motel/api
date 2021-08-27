<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrip;
use App\Models\Room;
use App\Models\Trip;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TripController extends Controller
{
    use ApiController;

    public function index(Request $request)
    {
        $response=$request->user()->trips()->with('room.hotel.city')->get();
        return $this->respond($response);
    }

    public function show(Trip $trip)
    {
        $this->authorize('view', $trip);
        $trip->load('room.hotel', 'passengers', 'payment');
        return $this->respond($trip);
    }

    public function store(Room $room, StoreTrip $request)
    {
        if (sizeof($request->passengers)>$room->max_capacity){
            return $this->setStatusCode(422)->respond(['errors'=>'Passenger count is more than room capacity']);
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
            return $this->setStatusCode(422)->respond(['errors'=>'Reserved for this period']);
        }
        $trip=auth()->user()->trips()->create([
            'start'=>$request->start,
            'end'=>$request->end,
            'room_id'=>$room->id,
            'amount'=>$room->price*$tripDays->count()
        ]);
        $trip->passengers()->createMany($request->passengers);
        return $this->respond($trip->id);
    }
}
