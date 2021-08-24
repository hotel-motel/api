<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities=City::has('hotels')->get();
        return response($cities);
    }

    public function show(City $city)
    {
        return response($city);
    }

    public function hotels(City $city)
    {
        return $city->hotels()->paginate();
    }
}
