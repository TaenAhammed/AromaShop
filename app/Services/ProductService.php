<?php

namespace App\Services;

use App\BusinessObjects\IProduct;
use App\Repositories\IProductRepository;

class ProductService implements IProductService
{
    private $_productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->_productRepository = $productRepository;
    }

    public function store(IProduct $product): void
    {
        $this->_productRepository->add($product);
    }
}
