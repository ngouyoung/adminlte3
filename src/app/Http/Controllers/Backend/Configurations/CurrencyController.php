<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Currency;
use App\Services\Currencies\CurrencyService;

class CurrencyController extends BackendController
{

    public function __construct(Currency $currency, CurrencyService $currencyService)
    {
        $this->mainPath = 'configurations.currencies.';
        $this->mainRoute = 'configurations.currencies.';
        $this->model = $currency;
        $this->service = $currencyService;
    }

    public function getData($relation = null)
    {
        return parent::getData($relation)
            ->addColumn('actions', function ($object) {
                return BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'currency');
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
