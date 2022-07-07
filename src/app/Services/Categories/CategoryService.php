<?php


namespace App\Services\Categories;


use App\Models\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
