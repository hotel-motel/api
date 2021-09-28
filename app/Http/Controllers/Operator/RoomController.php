<?php

namespace App\Http\Controllers\Operator;

use App\Http\Requests\EditRoom;
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

    public function show($id)
    {
        $room=Room::withTrashed()->findOrFail($id);
        return $this->respond($room->load(['hotel', 'trips.passengers']));
    }

    public function update(EditRoom $request, $id)
    {
        $room=Room::findOrFail($id);
        $room->update([
            'price'=>$request->price,
            'max_capacity'=>$request->capacity
        ]);
        return $this->respondNoContent();
    }

    public function destroy($id)
    {
        $room=Room::findOrFail($id);
        $room->delete();
        return $this->respondNoContent();
    }
}
