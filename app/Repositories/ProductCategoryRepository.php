<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Factories\ProductCategoryFactory;
use Illuminate\Support\Facades\Log;

class ProductCategoryRepository extends Repository implements IProductCategoryRepository
{
    public function __construct()
    {
        $product = resolve('App\Models\Category');
        parent::setModel($product);
    }

    public function add($productCategory)
    {
        $category = ProductCategoryFactory::productCategoryModelFromBO($productCategory);
        parent::add($category);
    }

    public function getAll()
    {
        $categoryArr = parent::getAll();
        return ProductCategoryFactory::createCategoriesBO($categoryArr);
    }
}
