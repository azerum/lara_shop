<?php

namespace Database\Factories;

use App\Helpers\FactoriesHelpers;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
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
    public function definition()
    {
        $statuses = FactoriesHelpers::getClassConstantsByPrefix(Transaction::class, 'STATUS_');
        $paymentTypes = FactoriesHelpers::getClassConstantsByPrefix(Transaction::class, 'PAYMENT_TYPE_');

        return [
            'status' => $this->faker->numberBetween(min($statuses), max($statuses)),
            'payment_type' => $this->faker->numberBetween(min($paymentTypes), max($paymentTypes)),
            'executed_at' => $this->faker->dateTime(),
            'order_id' => $this->faker->numberBetween(1, Order::count())
        ];
    }
}
