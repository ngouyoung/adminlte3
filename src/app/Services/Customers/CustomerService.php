<?php


namespace App\Services\Customers;


use App\Models\Customer;
use App\Services\BaseService;

class CustomerService extends BaseService
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }
}
