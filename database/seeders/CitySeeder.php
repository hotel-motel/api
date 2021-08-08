<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    private $cities=[
        "آذربایجان شرقی",
        "خراسان جنوبی",
        "خراسان رضوی",
        "خراسان شمالی",
        "خوزستان",
        "زنجان",
        "سمنان",
        "سیستان و بلوچستان",
        "فارس",
        "قزوین",
        "قم",
        "آذربایجان غربی",
        "کردستان",
        "کرمان",
        "کرمانشاه",
        "کهگیلویه و بویراحمد",
        "گلستان",
        "گیلان",
        "لرستان",
        "مازندران",
        "مرکزی",
        "هرمزگان",
        "اردبیل",
        "همدان",
        "یزد",
        "اصفهان",
        "البرز",
        "ایلام",
        "بوشهر",
        "تهران",
        "چهارمحال و بختیاری"
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
