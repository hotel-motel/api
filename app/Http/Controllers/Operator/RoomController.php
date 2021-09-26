<?php

namespace App\Http\Controllers\Operator;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRoom;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class RoomController extends Controller
{
    use ApiController;

    public function store(CreateRoom $request, Hotel $hotel)
    {
        return $hotel->rooms()->create([
            'number'=>$request->number,
            'price'=>$request->price,
            'floor'=>$request->floor,
            'max_capacity'=>$request->capacity,
        ]);
    }

    public function show(Room $room)
    {
        return $this->respond($room);
    }

    public function update(Request $request, Room $room)
    {
        // TODO
    }

    public function destroy(Room $room)
    {
        // TODO
    }
}
