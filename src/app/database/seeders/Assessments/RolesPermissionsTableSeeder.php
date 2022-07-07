<?php
namespace Database\Seeders\Assessments;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use \Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users') || Schema::hasTable('roles')){
//            $role = Role::where('name', 'LIKE', '%roles%')->first();
//            $user = Role::where('name', 'LIKE', '%users%')->first();
//            $permission = Role::where('name', 'LIKE', '%permissions%')->first();
//            $users = Permission::where('name', 'LIKE', '%users%')
//                ->orWhere('name', 'LIKE', '%access-management%')
//                ->orWhere('name', 'LIKE', '%users-management%')
//                ->orWhere('name', 'like', '%backend%')
//                ->get();
//            $roles = Permission::where('name', 'LIKE', '%roles%')
//                ->orWhere('name', 'LIKE', '%access-management%')
//                ->orWhere('name', 'LIKE', '%roles-management%')
//                ->orWhere('name', 'like', '%backend%')
//                ->get();
//            $permissions = Permission::where('name', 'LIKE', '%permissions%')
//                ->orWhere('name', 'LIKE', '%access-management%')
//                ->orWhere('name', 'LIKE', '%permissions-management%')
//                ->orWhere('name', 'like', '%backend%')
//                ->get();
//
//            $role->givePermissionTo($roles);
//            $user->givePermissionTo($users);
//            $permission->givePermissionTo($permissions);
//            $user = User::where('name', 'admin')->first();
//            $roles = Role::all();
//            $user->assignRole($roles);
//            $permissions = Permission::where('name', 'like', '%configurations%')->first();
//            $user = User::where('name', 'creator')->first();
//            $user->givePermissionTo($permissions);

            $user = User::where('name', 'Tester')->first();
            $role = Role::where('name', 'administration')->first();
            $permissions = Permission::all();
            $role->givePermissionTo($permissions);
            $user->assignRole($role);
        }
    }
}
