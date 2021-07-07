<?php

namespace Database\Seeders;

use App\Enums\SeedersConstants;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(SeedersConstants::ORDERS_COUNT)->create();
    }
}
