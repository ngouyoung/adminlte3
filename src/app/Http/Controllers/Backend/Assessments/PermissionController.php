<?php

namespace App\Http\Controllers\Backend\Assessments;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Permission;
use App\Services\GroupPermissions\GroupPermissionsService;
use App\Services\Permissions\PermissionService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PermissionController extends BackendController
{
    private GroupPermissionsService $serviceGroupPermissions;

    public function __construct(Permission $permission, PermissionService $permissionService, GroupPermissionsService $groupPermissionsService)
    {
        $this->mainPath = 'assessments.permissions.';
        $this->mainRoute = 'assessments.permissions.';
        $this->model = $permission;
        $this->service = $permissionService;
        $this->serviceGroupPermissions = $groupPermissionsService;
    }

    public function create($compact = null): View|Factory|Application
    {
        $compact['default'] = $this->serviceGroupPermissions->getById(4);
        return parent::create($compact);
    }

    public function getData($relation = null)
    {
        $relation = ['roles', 'users', 'group'];
        return parent::getData($relation)
            ->addColumn('roles', function ($object) {
                return $object->roles->map(function ($role) {
                    return '<span class="badge badge-success text-capitalize">' . $role->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('group', function ($object) {
                return '<span class="badge badge-info text-capitalize">' . $object->group->name . '</span>';
            })
            ->addColumn('users', function ($object) {
                return $object->users->map(function ($user) {
                    return '<span class="badge badge-primary text-capitalize">' . $user->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'permission');
            })
            ->rawColumns(['actions', 'roles', 'users', 'group'])
            ->make(true);
    }
}
