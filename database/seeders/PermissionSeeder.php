<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::insert([
            [
                'name'=>'hotel.1',
                'guard_name'=>'api'
            ],
            [
                'name'=>'hotel.2',
                'guard_name'=>'api'
            ],
            [
                'name'=>'hotel.3',
                'guard_name'=>'api'
            ],
            [
                'name'=>'hotel.4',
                'guard_name'=>'api'
            ],
            [
                'name'=>'hotel.5',
                'guard_name'=>'api'
            ]
        ]);
    }
}
