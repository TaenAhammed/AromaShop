<?php

namespace App\Repositories;

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
}
