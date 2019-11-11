<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Repository;

class ProductRepository extends Repository implements IProductRepository
{
    public function __construct(Product $product)
    {
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
}
