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

    public function store($data)
    {
        var_dump($data);
        echo ("<br/>From Repository<br/>");
        // parent::add($data);
    }
}
