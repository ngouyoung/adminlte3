<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();
        if (Schema::hasTable('currencies')) {
            $currencies = [
                [
                    'name' => 'Dollar',
                    'code' => 'USD',
                    'symbol' => '$',
                ],
                [
                    'name' => 'Rial',
                    'code' => 'KHR',
                    'symbol' => '៛',
                ],
            ];

            foreach ($currencies as $currency){
                Currency::create($currency);
            }
        }
    }
}
