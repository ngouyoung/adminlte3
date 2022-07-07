<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        if (Schema::hasTable('categories')) {
            $categories = [
                [
                    'name' => 'Category A',
                    'code' => 'CA'
                ],
            ];

            foreach ($categories as $category){
                Category::create($category);
            }
        }
    }
}
