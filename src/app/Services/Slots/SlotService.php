<?php


namespace App\Services\Slots;


use App\Models\Slot;
use App\Services\BaseService;

class SlotService extends BaseService
{
    public function __construct(Slot $slot)
    {
        $this->model = $slot;
    }
}
