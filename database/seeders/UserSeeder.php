<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
                'name'=>'Omid reza',
                'email_verified_at'=>now(),
                'email'=>'omid77.orh@gmail.com',
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'id'=>2,
                'name'=>'Ali reza',
                'created_at'=>now(),
                'updated_at'=>now(),
                'email_verified_at'=>null,
                'email'=>'ali77.orh@gmail.com',
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'id'=>3,
                'name'=>'Mohammad ali',
                'created_at'=>now(),
                'updated_at'=>now(),
                'email_verified_at'=>now(),
                'email'=>'mohammade77.orh@gmail.com',
                'password'=> Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
