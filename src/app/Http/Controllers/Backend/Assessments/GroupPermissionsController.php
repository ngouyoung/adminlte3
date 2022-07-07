<?php

namespace App\Http\Controllers\Backend\Assessments;

use App\Http\Controllers\Backend\BackendController;
use App\Models\GroupPermission;
use App\Services\GroupPermissions\GroupPermissionsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class GroupPermissionsController extends BackendController
{
    public function __construct(GroupPermission $groupPermission, GroupPermissionsService $groupPermissionsService)
    {
        $this->mainPath = 'assessments.group_permissions.';
        $this->mainRoute = 'assessments.group_permissions.';
        $this->model = $groupPermission;
        $this->service = $groupPermissionsService;
    }

    public function create($compact = null): View|Factory|Application
    {
        $compact['default'] = $this->service->getById(1);
        return parent::create($compact);
    }

    public function index($compact = null): View|Factory|Application
    {
        $compact['array'] = $this->model->parents()->get();
        return parent::index($compact);
    }

    public function getData($relation = null)
    {
        $relation = ['permissions'];
        return parent::getData($relation);
    }

    public function sort()
    {
        $this->service->updateSort(request()->data);
        return response()->json(['status' => 'OK']);
    }
}
