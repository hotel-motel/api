<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\ReserveRoom;

class RoomController extends Controller
{
    use ApiController;

    public function reserve(ReserveRoom $request, Room $room){
        $roomIsEmpty=$room->isEmpty($request->start, $request->end);
        abort_unless($roomIsEmpty, 403, 'Reserved for this period');
        $room->load('trips', 'hotel');
        return $this->respond($room);
    }
}
