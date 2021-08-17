<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities=City::all();
        return view('city.list', compact('cities'));
    }

    public function show(City $city)
    {
        return view('city.show', compact('city'));
    }

    public function hotels(City $city)
    {
        return $city->hotels;
    }
}
