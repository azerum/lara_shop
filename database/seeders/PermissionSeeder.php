<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Permission;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory(SeedersConstants::PERMISSIONS_COUNT)->create();
    }
}
