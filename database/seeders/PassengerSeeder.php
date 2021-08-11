<?php

namespace Database\Seeders;

use App\Models\passenger;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        passenger::factory()
            ->count(18)
            ->create();
    }
}
