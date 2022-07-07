<?php

namespace Database\Seeders\Assessments;

use Illuminate\Database\Seeder;
use App\Models\GroupPermission;

class GroupPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_permissions = [
            [
                'name' => 'All',
                'sort' => 1,
            ],
            [
                'name' => 'Assessments',
                'parent_id' => 1,
                'sort' => 1,
            ],
            [
                'name' => 'Configurations',
                'parent_id' => 1,
                'sort' => 2,
            ],
            [
                'name' => 'Other',
                'parent_id' => 1,
                'sort' => 4,
            ],
            [
                'name' => 'Users Management',
                'parent_id' => 2,
                'sort' => 1,
            ],
            [
                'name' => 'Roles Management',
                'parent_id' => 2,
                'sort' => 2,
            ],
            [
                'name' => 'Permissions Management',
                'parent_id' => 2,
                'sort' => 3,
            ],
            [
                'name' => 'Group Permissions Management',
                'parent_id' => 2,
                'sort' => 4,
            ],
            [
                'name' => 'Unit Management',
                'parent_id' => 3,
                'sort' => 1,
            ],
            [
                'name' => 'Currency Management',
                'parent_id' => 3,
                'sort' => 2,
            ],
            [
                'name' => 'Category Management',
                'parent_id' => 3,
                'sort' => 3,
            ],
            [
                'name' => 'Product Management',
                'parent_id' => 3,
                'sort' => 4,
            ],
            [
                'name' => 'Customer Management',
                'parent_id' => 1,
                'sort' => 3,
            ]
        ];

        foreach ($group_permissions as $item) {
            GroupPermission::create($item);
        }
    }
}
