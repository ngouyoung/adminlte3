<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Unit;
use App\Services\Units\UnitService;

class UnitController extends BackendController
{

    public function __construct(Unit $unit, UnitService $unitService)
    {
        $this->mainPath = 'configurations.units.';
        $this->mainRoute = 'configurations.units.';
        $this->model = $unit;
        $this->service = $unitService;
    }


    public function getData($relation = null)
    {
        return parent::getData($relation)
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'unit');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
