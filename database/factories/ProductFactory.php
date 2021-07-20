<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(rand(3, 7)),
            'price' => $this->faker->numberBetween(100_00, 10_000_00),
            'quantity' => $this->faker->numberBetween(0, 1000),
            'subcategory_id' => $this->faker->numberBetween(1, Subcategory::count())
        ];
    }
}
