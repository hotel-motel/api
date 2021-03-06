<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start'=>$this->faker->date,
            'end'=>$this->faker->date,
            'room_id'=>$this->faker->numberBetween(1, Room::count()),
            'creator_id'=>$this->faker->numberBetween(1, User::count()),
            'amount'=>$this->faker->numberBetween(1, 9999999)
        ];
    }
}
