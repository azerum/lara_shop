<?php

namespace Database\Seeders;

use App\Constants\SeedersConstants;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Invoices and orders have one-to-one relationship
        Invoice::factory(SeedersConstants::ORDERS_COUNT)->create();
    }
}
