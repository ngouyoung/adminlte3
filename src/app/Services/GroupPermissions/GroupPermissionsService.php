<?php


namespace App\Services\GroupPermissions;


use App\Models\GroupPermission;
use App\Services\BaseService;

class GroupPermissionsService extends BaseService
{
    public function __construct(GroupPermission $groupPermission)
    {
        $this->model = $groupPermission;
    }

    public function getParents()
    {
        return $this->model->parents()->get();
    }

    public function sortChild($parent_id, $child_data)
    {
        $child_sort = 1;
        foreach ($child_data as $child) {
            $this->model->find((int)$child['id'])->update([
                'parent_id' => (int)$parent_id,
                'sort' => $child_sort,
            ]);
            if (isset($child['children']) && count($child['children'])) {
                $this->sortChild($child['id'], $child['children']);
            }
            $child_sort++;
        }
    }

    public function updateSort($hierarchy)
    {
        foreach ($hierarchy as $key => $group) {
            $this->model->find((int)$group['id'])->update([
                'parent_id' => null,
                'sort' => $key + 1,
            ]);
            if (isset($group['children']) && count($group['children'])) {
                $this->sortChild($group['id'], $group['children']);
            }
        }
        return true;
    }
}
