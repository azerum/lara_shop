<?php

namespace Database\Seeders;

use App\Enums\SeedersConstants;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::factory(SeedersConstants::TRANSACTIONS_COUNT)->create();
    }
}
