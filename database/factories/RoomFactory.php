<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number'=>$this->faker->numberBetween(1, 10000),
            'price'=>$this->faker->numberBetween(30000, 2000000),
            'max_capacity'=>$this->faker->numberBetween(1, 10),
            'hotel_id'=>$this->faker->numberBetween(1, Hotel::count())
        ];
    }
}
