<?php


namespace App\Services\Stocks;


use App\Models\Inventory;
use App\Models\Stock;
use App\Services\BaseService;
use App\Services\Inventories\InventoryService;
use Illuminate\Support\Facades\DB;

/**
 * @property InventoryService $inventoryService
 */
class StockService extends BaseService
{
    public function __construct(Stock $stock, InventoryService $inventoryService)
    {
        $this->model = $stock;
        $this->inventoryService = $inventoryService;
    }

    public function create($attributes)
    {
        try {
            DB::beginTransaction();
            $object = $this->model->where('product_id', $attributes->product_id)
                ->where('batch', $attributes->batch)->first();
            if ($object) {
                $object->update(['quantity' => $object->quantity + $attributes->quantity]);
            } else {
                $object = parent::create($attributes);
            }
            $attributes['stock_id'] = $object->id;
            $inventoryCreated = $this->inventoryService->create($attributes);
            if ($inventoryCreated) {
                DB::commit();
                return $object;
            } else {
                DB::rollBack();
                return '400';
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return '400';
        }
    }
}
