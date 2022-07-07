<?php


namespace App\Services\Currencies;


use App\Models\Currency;
use App\Services\BaseService;

class CurrencyService extends BaseService
{
    public function __construct(Currency $currency)
    {
        $this->model = $currency;
    }
}
