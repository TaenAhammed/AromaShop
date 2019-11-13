<?php

namespace App\Services;

use App\BusinessObjects\IProduct;

interface IProductService
{
    public function store(IProduct $product): void;
}
