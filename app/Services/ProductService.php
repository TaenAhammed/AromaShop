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

    public function getAll()
    {
        return $this->_productRepository->getAll();
    }

    public function get($product)
    {
        return $this->_productRepository->get($product);
    }

    public function delete($product)
    {
        $this->_productRepository->delete($product);
    }

    public function update($product)
    {
        $this->_productRepository->update($product, $product->getId());
    }
}
