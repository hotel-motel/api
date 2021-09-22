<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::find(1);
        $user->givePermissionTo('hotel.1');
        $user=User::find(2);
        $user->givePermissionTo('hotel.2');
    }
}
