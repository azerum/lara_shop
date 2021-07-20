<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;

class OrderFactory extends FactoryWithRandomConstantGeneration
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'status' => $this->randomModelConstantWithPrefix('STATUS_'),
            'total_price' => $this->faker->numberBetween(100_00, 20_000_00),
            'delivery_price' => $this->faker->numberBetween(0, 20_000),
            'user_id' => $this->faker->numberBetween(1, User::count())
        ];
    }
}
