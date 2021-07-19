<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(SeedersConstants::PRODUCTS_COUNT)->create();
    }
}
