<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function show(Room $room){
        $room->load('trips', 'hotel');
        return view('room.show', compact('room'));
    }
}
