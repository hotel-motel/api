<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id'=>$this->faker->regexify('[A-Za-z0-9]{20}'),
            'reference_id'=>$this->faker->regexify('[A-Za-z0-9]{20}'),
            'amount'=>$this->faker->numberBetween(200000, 1000000),
            'trip_id'=>$this->faker->numberBetween(1, Trip::count())
        ];
    }
}
