<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slot::truncate();
        if (Schema::hasTable('slots')) {
            $slots = [
                [
                    'name' => 'Slot A',
                    'code' => 'SA'
                ],
            ];

            foreach ($slots as $slot){
                Slot::create($slot);
            }
        }
    }
}
