<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Transaction;

class TransactionFactory extends FactoryWithRandomConstantGeneration
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'status' => $this->randomModelConstantWithPrefix('STATUS_'),
            'payment_type' => $this->randomModelConstantWithPrefix('PAYMENT_TYPE_'),
            'executed_at' => $this->faker->dateTime(),
            'order_id' => $this->faker->numberBetween(1, Order::count())
        ];
    }
}
