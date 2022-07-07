<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\Categories\CategoryService;
use App\Services\Customers\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends BackendController
{
    public function __construct(Customer $customer, CustomerService $customerService)
    {
        $this->mainPath = 'customers.';
        $this->mainRoute = 'customers.';
        $this->model = $customer;
        $this->service = $customerService;
    }
}
