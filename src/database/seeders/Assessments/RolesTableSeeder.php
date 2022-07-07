<?php
namespace Database\Seeders\Assessments;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        if (Schema::hasTable('roles')) {
//            $models = [
//                'users', 'roles', 'permissions'
//            ];
//            foreach ($models as $model) {
//                $roles = [
//                    [
//                        'name' => $model . '-managements'
//                    ],
//                ];
//                foreach ($roles as $role) {
//                    Role::create([
//                        'name' => $role['name']
//                    ]);
//                }
//            }

            $roles = [
                [
                    'name' => 'administration',
                ]
            ];

            foreach ($roles as $role) {
                Role::create($role);
            }
        }
    }
}
