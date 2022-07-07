<?php


namespace App\Services\Permissions;


use App\Models\Permission;
use App\Services\BaseService;

class PermissionService extends BaseService
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

//    public function create($attributes)
//    {
//        dd($attributes);
//        return parent::create($attributes);
//    }
}
