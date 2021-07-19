<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(SeedersConstants::USERS_COUNT)->create();
    }
}
