<?php

namespace App\Http\Controllers\Backend\Inventories;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Inventory;
use App\Services\Inventories\InventoryService;

class ReportController extends BackendController
{
    public function __construct(Inventory $inventory, InventoryService $inventoryService)
    {
        $this->mainPath = 'inventories.reports.';
        $this->mainRoute = 'inventories.reports.';
        $this->model = $inventory;
        $this->service = $inventoryService;
    }
}
