<?php

namespace App\Services;

use App\Repositories\IProductRepository;

class ProductService implements IProductService
{
    private $_productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->_productRepository = $productRepository;
    }

    public function store(array $data): void
    {
        $this->_productRepository->store($data);
    }
}
