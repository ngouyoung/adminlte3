<?php


namespace App\Services\Inventories;


use App\Models\Inventory;
use App\Services\BaseService;

class InventoryService extends BaseService
{
    public function __construct(Inventory $inventory)
    {
        $this->model = $inventory;
    }
}
