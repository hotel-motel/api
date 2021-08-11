<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $hotel->load([
            'rooms'=>function($query){
                $query->orderBy('floor');
            },
            'city',
            'rooms.trips'
        ]);
        return view('hotel.show', compact('hotel'));
    }
}
