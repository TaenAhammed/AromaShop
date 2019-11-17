<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Repository;
use App\Factories\ProductsFactory as ProductsFactory;

class ProductRepository extends Repository implements IProductRepository
{
    public function __construct()
    {
        $product = resolve('App\Models\Product');
        parent::setModel($product);
    }

    public function add($product)
    {
        $product_arr = [
            'name' => $product->getName(),
            'image' => $product->getImage(),
            'price' => $product->getPrice(),
            'category' => $product->getCategory(),
            'discount' => $product->getDiscount()
        ];

        parent::add($product_arr);
    }

    public function getAll()
    {
        $productsArr = parent::getAll();
        return ProductsFactory::createProduct($productsArr);
    }
}
