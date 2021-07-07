<?php

namespace Database\Factories;

use App\Helpers\FactoriesHelpers;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
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
    public function definition()
    {
        $statuses = FactoriesHelpers::getClassConstantsByPrefix(Order::class, 'STATUS_');

        return [
            'status' => $this->faker->numberBetween(min($statuses), max($statuses)),
            'total_price' => $this->faker->numberBetween(100_00, 20_000_00),
            'delivery_price' => $this->faker->numberBetween(0, 20_000),
            'user_id' => $this->faker->numberBetween(1, User::count())
        ];
    }
}
