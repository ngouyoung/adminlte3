<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    protected $path = 'errors.pages.';

    public function _404(): Factory|View|Application
    {
        return view($this->path . '404');
    }
}
