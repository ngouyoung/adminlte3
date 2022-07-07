<?php

namespace App\Http\Controllers\Backend\Inventories;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Stock;
use App\Services\Stocks\StockService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StockController extends BackendController
{
    public function __construct(Stock $stock, StockService $stockService)
    {
        $this->mainPath = 'inventories.stocks.';
        $this->mainRoute = 'inventories.stocks.';
        $this->model = $stock;
        $this->service = $stockService;
    }

    public function getData($relation = null)
    {
        $relation = ['product'];
        return parent::getData($relation)
            ->addColumn('image', function ($object) {
                return ' <img src="' . asset($object->image) . '" style="width: 50px" class="text-center img-thumbnail" alt="' . $object->image . '"> ';
            })
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'category');
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }

    public function edit($id, $compact = null): View|Factory|Application|RedirectResponse
    {
        return parent::edit($id, $compact);
    }
}
