<?php


namespace App\Services\Suppliers;


use App\Models\Supplier;
use App\Services\BaseService;

class SupplierService extends BaseService
{
    public function __construct(Supplier $slot)
    {
        $this->model = $slot;
    }
}
