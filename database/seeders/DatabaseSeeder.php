<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            HotelSeeder::class,
            RoomSeeder::class,
            TripSeeder::class,
            PaymentSeeder::class,
            PassengerSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            HotelOperatorSeeder::class,
        ]);
    }
}
