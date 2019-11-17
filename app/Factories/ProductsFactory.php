<?php

namespace App\Factories;

class ProductsFactory
{
    public static function createProduct($productsArr)
    {
        $products = [];

        foreach ($productsArr as $productArrItem) {
            $product = resolve('App\BusinessObjects\IProduct');

            $product->setName($productArrItem['name']);
            $product->setImage($productArrItem['image']);
            $product->setPrice($productArrItem['price']);
            $product->setCategory($productArrItem['category']);
            $product->setDiscount($productArrItem['discount']);

            $products[] = $product;
        }

        return $products;
    }
}
