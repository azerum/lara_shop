<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderProductPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [];

        $ordersCount = Order::count();
        $productsCount = Product::count();

        for ($orderId = 1; $orderId < $ordersCount; ++$orderId) {
            $productsPerOrder = rand(1, SeedersConstants::MAX_PRODUCTS_PER_ORDER);

            for ($i = 0; $i < $productsPerOrder; ++$i) {
                $relation = [
                    'order_id' => $orderId,
                    'product_id' => rand(1, $productsCount)
                ];

                array_push($values, $relation);
            }
        }

        DB::table('order_product')->insert($values);
    }
}
