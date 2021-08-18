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
        abort_if($validator->fails(), 403, 'invalid start & end dates');
        $roomIsEmpty=$room->isEmpty($request->start, $request->end);
        abort_unless($roomIsEmpty, 403, 'Reserved for this period');
        $room->load('trips', 'hotel');
        return view('room.show', compact('room'));
    }
}
