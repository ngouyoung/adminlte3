<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends BackendController
{
    /**
     * @return Factory|View|Application
     */
    public function index($compact = null): Factory|View|Application
    {
        return parent::viewCompact('dashboard.index');
    }
}
