<?php

namespace Database\Seeders;

use Database\Seeders\Assessments\GroupPermissionsTableSeeder;
use Database\Seeders\Assessments\PermissionsTableSeeder;
use Database\Seeders\Assessments\RolesPermissionsTableSeeder;
use Database\Seeders\Assessments\RolesTableSeeder;
use Database\Seeders\Assessments\UserTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            UserTableSeeder::class,
            GroupPermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesPermissionsTableSeeder::class,
        ]);
    }
}
