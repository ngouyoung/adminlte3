<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::truncate();
        if (Schema::hasTable('suppliers')) {
            $suppliers = [
                [
                    'name' => 'Supplier A',
                    'code' => 'SPA'
                ],
            ];

            foreach ($suppliers as $supplier){
                Supplier::create($supplier);
            }
        }
    }
}
