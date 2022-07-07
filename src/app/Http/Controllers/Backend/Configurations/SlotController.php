<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Slot;
use App\Services\Slots\SlotService;

class SlotController extends BackendController
{
    public function __construct(Slot $slot, SlotService $slotService)
    {
        $this->mainPath = 'configurations.slots.';
        $this->mainRoute = 'configurations.slots.';
        $this->model = $slot;
        $this->service = $slotService;
    }

    public function getData($relation = null)
    {
        return parent::getData($relation)
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'slot');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
