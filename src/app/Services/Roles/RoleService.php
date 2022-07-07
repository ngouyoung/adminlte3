<?php


namespace App\Services\Roles;


use App\Models\Role;
use App\Services\BaseService;
use App\Services\Permissions\PermissionService;

/**
 * @property PermissionService $permissionService
 */
class RoleService extends BaseService
{
    public function __construct(Role $role, PermissionService $permissionService)
    {
        $this->model = $role;
        $this->permissionService = $permissionService;
    }

    public function create($attributes)
    {
        if (!$attributes) {
            return '400';
        }
        $object = $this->model->create($attributes->all());
        if ($object instanceof $this->model){
            if (!empty($attributes->permissions)) {
                $getArray = $this->permissionService->getByArray('id', $attributes->permissions);
                $object->givePermissionTo($getArray);
            }
        }
        return $object;
    }

    public function updateById($id, $attribute)
    {
        $modelObj = $this->getById($id);
        if (!$modelObj) {
            return '400';
        }
        $result = $modelObj->fill($attribute->all());
        $result->update();
        if (!empty($attribute->permissions)) {
            $permissions = $this->permissionService->getByArray('id', $attribute->permissions);
            $result->syncPermissions($permissions);
        } else $result->syncPermissions('');
        return $result;
    }
}
