<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GroupPermission;
use App\Services\GroupPermissions\GroupPermissionsService;

class FilterController extends Controller
{
    protected GroupPermission $groupPermission;
    protected GroupPermissionsService $groupPermissionService;

    public function __construct(
        GroupPermission         $groupPermission,
        GroupPermissionsService $groupPermissionsService
    )
    {
        $this->groupPermission = $groupPermission;
        $this->groupPermissionService = $groupPermissionsService;
    }

//    public function group_permissions()
//    {
//        return $this->groupPermissionService
//            ->selectField(['id', 'name as text'])
//            ->orderBy('id', 'ASC')
//            ->paginate(10);
//    }

//    public function group_permissions()
//    {
//        return $this->groupPermissionService
//            ->selectField(['id', 'name as text'])
//            ->orderBy('id', 'ASC')
//            ->paginate(10);
//    }
//
//    public function group_permissions()
//    {
//        return $this->groupPermissionService
//            ->selectField(['id', 'name as text'])
//            ->orderBy('id', 'ASC')
//            ->paginate(10);
//    }
//
//    public function group_permissions()
//    {
//        return $this->groupPermissionService
//            ->selectField(['id', 'name as text'])
//            ->orderBy('id', 'ASC')
//            ->paginate(10);
//    }
}
