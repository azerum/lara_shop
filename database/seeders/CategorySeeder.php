<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(SeedersConstants::CATEGORIES_COUNT)->create();
    }
}
