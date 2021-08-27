<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    use ApiController;

    public function index()
    {
        $cities=City::has('hotels')->get();
        return $this->respond($cities);
    }

    public function show(City $city)
    {
        return $this->respond($city);
    }

    public function hotels(City $city)
    {
        return $this->respond($city->hotels()->paginate());
    }
}
