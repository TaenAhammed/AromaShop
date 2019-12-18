<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Factories\ProductsFactory as ProductsFactory;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Category;

class ProductRepository extends Repository implements IProductRepository
{
    public function __construct()
    {
        $product = resolve('App\Models\Product');
        parent::setModel($product);
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

    public function add($product)
    {
        $category = Category::where(['id' => $product->getCategory()])->first();

        $productORM = new Product();
        $productORM->name = $product->getName();
        $productORM->image = $product->getImage();
        $productORM->price = $product->getPrice();;
        $productORM->category()->associate($category);
        $productORM->discount = $product->getDiscount();
        $productORM->save();
    }

    public function getAll()
    {
        $productsArr = parent::getAll();
        return ProductsFactory::createProducts($productsArr);
    }

    public function get($product)
    {
        $id = $product->getId();
        $product = parent::get($id);

        $productBO = resolve('App\BusinessObjects\Product');
        $productBO->setId($product['id']);
        $productBO->setName($product['name']);
        $productBO->setImage($product['image']);
        $productBO->setPrice($product['price']);
        $productBO->setCategory($product['category']);
        $productBO->setDiscount($product['discount']);

        return $productBO;
    }

    public function getById($id)
    {
        $product = parent::get($id);

        $productBO = resolve('App\BusinessObjects\Product');
        $productBO->setId($product['id']);
        $productBO->setName($product['name']);
        $productBO->setImage($product['image']);
        $productBO->setPrice($product['price']);
        $productBO->setCategory($product['category']);
        $productBO->setDiscount($product['discount']);

        return $productBO;
    }

    public function delete($product)
    {
        $id = $product->getId();
        parent::delete($id);
    }

    public function update($product, $id)
    {
        $product_arr = [
            'name' => $product->getName(),
            'image' => $product->getImage(),
            'price' => $product->getPrice(),
            'category' => $product->getCategory(),
            'discount' => $product->getDiscount()
        ];

        $id = $product->getId();
        parent::update($product_arr, $id);
    }

    public function getPagedProducts($searchText, $sortOrder, $pageIndex, $pageSize)
    {
        $productsArr = $this->getWithFilter('name', $searchText, $sortOrder->columnName, $sortOrder->columnDirection, $pageIndex, $pageSize);
        return ProductsFactory::createProducts($productsArr);
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
