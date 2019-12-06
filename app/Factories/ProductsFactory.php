<?php

namespace App\Factories;

use App\ViewModels\ICreateProductModel;

class ProductsFactory
{
    public static function createProducts($productsArr)
    {
        $products = [];

        foreach ($productsArr as $productArrItem) {
            $product = resolve('App\BusinessObjects\IProduct');

            $product->setId($productArrItem['id']);
            $product->setName($productArrItem['name']);
            $product->setImage($productArrItem['image']);
            $product->setPrice($productArrItem['price']);
            $product->setCategory($productArrItem['category']);
            $product->setDiscount($productArrItem['discount']);

            $products[] = $product;
        }

        return $products;
    }

    public static function convertProductFromModel(ICreateProductModel $model)
    {
        $product = resolve('App\BusinessObjects\IProduct');
        $product->setId($model->id);
        $product->setName($model->name);
        $product->setImage($model->image);
        $product->setPrice($model->price);
        $product->setCategory($model->category_id);
        $product->setDiscount($model->discount);
        return $product;
    }
}
