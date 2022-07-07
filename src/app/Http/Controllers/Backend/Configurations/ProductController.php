<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Product;
use App\Services\Products\ProductService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends BackendController
{
    public function __construct(Product $product, ProductService $productService)
    {
        $this->mainPath = 'configurations.products.';
        $this->mainRoute = 'configurations.products.';
        $this->model = $product;
        $this->service = $productService;
    }

    public function getData($relation = null)
    {
        $relation = ['currency', 'slot', 'category'];
        return parent::getData($relation)
            ->addColumn('image', function ($object) {
                return ' <img src="' . asset($object->image) . '" style="width: 50px" class="text-center img-thumbnail" alt="' . $object->image . '"> ';
            })
            ->addColumn('slot_name', function ($object) {
                if ($object->slot) return $object->slot->name;
                else return 'N/A';
            })
            ->addColumn('category_name', function ($object) {
                if ($object->category) return $object->category->name;
                else return 'N/A';
            })
            ->addColumn('currency_code', function ($object) {
                if ($object->currency) return $object->currency->code;
                else return 'N/A';
            })
            ->addColumn('quantity', function ($object) {
                return $object->stocks->sum('quantity');
            })
            ->addColumn('actions', function ($object) {
                $html = ' <button class="btn btn-xs btn-warning" id="changeImage" data-toggle="tooltip" title="Upload Image" data-remote="' . route('admin.configurations.products.update-image', $object->id) . '"><i class="fa-solid fa-images"></i></button> ';
                $html .= ' <button class="btn btn-xs btn-primary" data-toggle="tooltip" title="Stock"><i class="fa-solid fa-warehouse"></i></button> ';
                $html .= BUTTON_CRUD($object, $this->headRoute . $this->mainRoute, 'category');
                return $html;
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }

    public function updateImage($id, Request $request)
    {
        DB::beginTransaction();
        $result = $this->service->changeImage($id, $request);
        if ($result) {
            DB::commit();
            return $this->updated(true);
        } else {
            DB::rollBack();
            return $this->notFound();
        }
    }
}
