<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class HotelOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::where(['name'=>'operator'])->first();

        $user=User::find(1);
        $user->givePermissionTo('hotel.1');
        $user->assignRole($role);

        $user=User::find(2);
        $user->givePermissionTo('hotel.2');
        $user->assignRole($role);
    }
}
