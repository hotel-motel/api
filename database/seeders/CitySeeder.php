<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    private $cities=[
        "Tabriz",
        "Birjand",
        "Mashhad",
        "Bojnord",
        "Ahvaz",
        "Zanjan",
        "Semnan",
        "Zahedan",
        "Shiraz",
        "Qazvin",
        "Qom",
        "Urmia",
        "Saqqez",
        "Kerman",
        "Kermanshah",
        "Yasuj",
        "Gorgan",
        "Rasht",
        "Khorramabad",
        "Sari",
        "Arak",
        "Bandar Abbas",
        "Ardabil",
        "Hamedan",
        "Yazd",
        "Isfahan",
        "Karaj",
        "Ilam",
        "Bushehr",
        "Tehran",
        "Shahr-e Kord"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cities as $city){
            City::insert([
               'name'=>$city
            ]);
        }
    }
}
