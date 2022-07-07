<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::truncate();
        if (Schema::hasTable('units')) {
            $units = [
                [
                    'name' => 'Unit A',
                    'code' => 'UA'
                ],
            ];

            foreach ($units as $unit){
                Unit::create($unit);
            }
        }
    }
}
