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

    public function getWithFilter($field, $fieldValue, $orderColumn, $orderDirection, $pageIndex, $pageSize)
    {
        $skipItems = ($pageIndex - 1) * $pageSize;

        if ($fieldValue === null) {
            return $this->model->orderBy($orderColumn, $orderDirection)
                ->skip($skipItems)
                ->take($pageSize)
                ->get();
        } else {
            return $this->model->where($field, 'like', '%' . $fieldValue . '%')
                ->orderBy($orderColumn, $orderDirection)
                ->skip($skipItems)
                ->take($pageSize)
                ->get();
        }
    }

    public function getPagedProducts($searchText, $sortOrder, $pageIndex, $pageSize)
    {
        $productsArr = $this->getWithFilter('name', $searchText, $sortOrder->columnName, $sortOrder->columnDirection, $pageIndex, $pageSize);
        return ProductCategoryFactory::createProducts($productsArr);
    }

    public function getTotalProductCount()
    {
        return count($this->getAll());
    }

    public function getTotalDisplayableProducts($searchText)
    {
        return $this->model->where('name', 'like', '%' . $searchText . '%')
            ->count();
    }
}
