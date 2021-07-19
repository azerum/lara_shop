<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::factory(SeedersConstants::SUBCATEGORIES_COUNT)->create();
    }
}
