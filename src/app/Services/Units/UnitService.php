<?php


namespace App\Services\Units;


use App\Models\Currency;
use App\Models\Unit;
use App\Services\BaseService;

class UnitService extends BaseService
{
    public function __construct(Unit $unit)
    {
        $this->model = $unit;
    }
}
