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
                'name'=>'هتل اسپیناس پالاس',
                'address'=>'سعادت آباد، میدان بهرود، خیابان 33، شماره 21',
                'star'=>5,
                'city_id'=>30,
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'id'=>2,
                'name'=>'هتل بزرگ زنجان',
                'address'=>'بزرگراه 22 بهمن',
                'star'=>4,
                'city_id'=>6,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>3,
                'name'=>'هتل هما',
                'address'=>'میدان ونک، خیابان ولیعصر، خیابان شهید خدامی، شماره 51',
                'star'=>5,
                'city_id'=>30,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>4,
                'name'=>'هتل چمران',
                'address'=>'بلوار چمران',
                'star'=>5,
                'city_id'=>9,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'updated_at'=>now()
            ],
            [
                'id'=>5,
                'name'=>'هتل قصر طلایی',
                'address'=>'خیابان امام رضا، بین امام رضا ۳۴ و ۳۶',
                'star'=>5,
                'city_id'=>3,
                'created_at'=>now(),
                'image'=>'https://cdn.alibaba.ir/inh/domestic-hotel/image_be14e9c4-42d8-426e-8e9a-e2b060f49662.jpg',
                'updated_at'=>now()
            ]
        ]);
    }
}
