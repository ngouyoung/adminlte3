<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        if (Schema::hasTable('products')) {
            $products = [
                [
                    'name' => 'Product A',
                    'code' => 'PA',
                    'category_id' => 1,
                    'currency_id' => 1,
                    'slot_id' => 1,
                ],
            ];

            foreach ($products as $product){
                Product::create($product);
            }
        }
    }
}
