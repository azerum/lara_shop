<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,

            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderProductPivotTableSeeder::class,
            InvoiceSeeder::class,
            TransactionSeeder::class,

            PermissionSeeder::class,
            RoleSeeder::class,
            AuthTablesRelationSeeder::class,
        ]);
    }
}
