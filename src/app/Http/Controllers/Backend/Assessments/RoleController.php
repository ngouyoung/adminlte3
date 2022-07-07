<?php

namespace App\Http\Controllers\Backend\Assessments;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Role;
use App\Services\GroupPermissions\GroupPermissionsService;
use App\Services\Roles\RoleService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends BackendController
{
    protected GroupPermissionsService $groupPermissionService;

    public function __construct(Role $role, RoleService $roleService, GroupPermissionsService $groupPermissionsService)
    {
        $this->mainPath = 'assessments.roles.';
        $this->mainRoute = 'assessments.roles.';
        $this->model = $role;
        $this->service = $roleService;
        $this->groupPermissionService = $groupPermissionsService;
    }

    public function getData($relation = null)
    {
        $relation = ['permissions'];
        return parent::getData($relation)
            ->addColumn('permissions', function ($object) {
                return $object->permissions->map(function ($permission) {
                    return '<span class="badge badge-success text-capitalize">' . $permission->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('countUsers', function ($object) {
                return count($object->users);
            })
            ->editColumn('name', function ($role) {
                return '<span class="text-capitalize">' . $role->name . '</span>';
            })
            ->addColumn('code', function ($role) {
                return $role->name;
            })
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'role');
            })
            ->rawColumns(['actions', 'permissions', 'name'])
            ->make(true);
    }

    public function create($compact = null): View|Factory|Application
    {
        $group_permissions = $this->groupPermissionService->getParents();
        $compact['group_permissions'] = $group_permissions;
        return parent::create($compact);
    }

    public function edit($id, $compact = null): View|Factory|Application|RedirectResponse
    {
        $group_permissions = $this->groupPermissionService->getParents();
        $compact['group_permissions'] = $group_permissions;
        return parent::edit($id, $compact);
    }
}
