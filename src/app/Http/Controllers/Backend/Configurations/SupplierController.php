<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Services\Suppliers\SupplierService;

class SupplierController extends BackendController
{
    public function __construct(Supplier $supplier, SupplierService $supplierService)
    {
        $this->mainPath = 'configurations.suppliers.';
        $this->mainRoute = 'configurations.suppliers.';
        $this->model = $supplier;
        $this->service = $supplierService;
    }

    public function getData($relation = null)
    {
        return parent::getData($relation)
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'supplier');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
