<?php

namespace App\Http\Controllers\Backend\Configurations;

use App\Http\Controllers\Backend\BackendController;
use App\Models\Category;
use App\Services\Categories\CategoryService;
use function BUTTON_CRUD;

class CategoryController extends BackendController
{
    public function __construct(Category $category, CategoryService $categoryService)
    {
        $this->mainPath = 'configurations.categories.';
        $this->mainRoute = 'configurations.categories.';
        $this->model = $category;
        $this->service = $categoryService;
    }

    public function getData($relation = null)
    {
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
}
