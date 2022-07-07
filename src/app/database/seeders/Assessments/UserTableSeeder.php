<?php

namespace Database\Seeders\Assessments;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        if (Schema::hasTable('users')) {
            $users = [
                [
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make(12345678),
                    'isAdmin' => true
                ],
                [
                    'name' => 'Tester',
                    'email' => 'Tester@gmail.com',
                    'password' => Hash::make(12345678),
                ],
            ];

            foreach ($users as $user){
                User::create($user);
            }
        }
    }
}
