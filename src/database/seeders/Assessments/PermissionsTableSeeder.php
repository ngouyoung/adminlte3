<?php

namespace Database\Seeders\Assessments;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        $models = [
            'user', 'role', 'permission', 'group-permission'
        ];

        foreach ($models as $key => $model) {
            $actions = [
                [
                    'name' => 'list-' . $model,
                    'group_id' => $key + 5
                ],
                [
                    'name' => 'create-' . $model,
                    'group_id' => $key + 5
                ],
                [
                    'name' => 'edit-' . $model,
                    'group_id' => $key + 5
                ],
                [
                    'name' => 'delete-' . $model,
                    'group_id' => $key + 5
                ],
                [
                    'name' => 'view-' . $model,
                    'group_id' => $key + 5
                ],
//                [
//                    'name' => $model . '-managements',
//                    'group_id' => $key+4
//                ]
            ];
            foreach ($actions as $action) {
                Permission::create([
                    'name' => $action['name'],
                    'group_id' => $action['group_id']
                ]);
            }
        }
        $permissions = [
            [
                'name' => 'change-password-user',
                'group_id' => 5,
            ],
            [
                'name' => 'sort-group-permission',
                'group_id' => 8,
            ],
            [
                'name' => 'backend',
                'group_id' => 4
            ],
            [
                'name' => 'access',
                'group_id' => 4
            ],
            [
                'name' => 'configurations',
                'group_id' => 4
            ]
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'group_id' => $permission['group_id']
            ]);
        }
    }
}
