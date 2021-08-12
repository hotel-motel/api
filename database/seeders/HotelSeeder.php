<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::insert([
            [
                'id'=>1,
                'name'=>'Espinas Palace Hotel',
                'address'=>'sadat abad, Behroud Sq, 33 St, 21 No',
                'star'=>5,
                'city_id'=>30,
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'id'=>2,
                'name'=>'Zanjan Grand Hotel',
                'address'=>'22 bahman Highway',
                'star'=>4,
                'city_id'=>6,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_795877a8-c291-4359-af0e-90e64e0a1dbb.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>3,
                'name'=>'Homa Hotel',
                'address'=>'Vanak Sq, Valiasr Street, Shahid، Khoddami St, 51 No',
                'star'=>5,
                'city_id'=>30,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_68c3fffc-817b-434d-945a-5fa6bb78a430.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>4,
                'name'=>'Chamran Hotel',
                'address'=>'Chamran Sq',
                'star'=>5,
                'city_id'=>9,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_07ad8b34-a8df-4d9b-a4a1-8a075a236898.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>5,
                'name'=>'Ghasr Talaee Hotel',
                'address'=>'Razavi Khorasan Province, Mashhad, Emam Reza Blvd',
                'star'=>5,
                'city_id'=>3,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_f06e27a7-da9b-4872-8435-6dd8d7525e76.jpg',
                'updated_at'=>now()
            ]
        ]);
    }
}
