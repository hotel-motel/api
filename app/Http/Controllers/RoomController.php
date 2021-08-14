<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function reserve(Request $request, Room $room){
        $validator=Validator::make($request->all(), [
            'start'=>'required|date',
            'end'=>'required|bail|date|after:start'
        ]);
        //TODO: make fail error response in this part pretty
        if ($validator->fails()){
            abort(403, 'invalid start & end dates');
        }
        $roomIsEmpty=$room->isEmpty($request->start, $request->end);
        if ( ! $roomIsEmpty){
            abort(403, 'Reserved for this period');
        }
        $room->load('trips', 'hotel');
        return view('room.show', compact('room'));
    }
}
