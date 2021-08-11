<?php

namespace Database\Factories;

use App\Models\Passenger;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassengerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passenger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'national_code'=>$this->faker->regexify('[0-9]{10}'),
            'trip_id'=>$this->faker->numberBetween(1, Trip::count())
        ];
    }
}
