<?php

namespace App\ViewModels;

use App\Services\IProductService;

class ListProductModel implements IListProductModel
{
    private $_productService;

    public function __construct(IProductService $productService)
    {
        $this->_productService = $productService;
    }

    public function getAll()
    {
        return $this->_productService->getAll();
    }

    public function get($id)
    {
        $product = resolve('App\BusinessObjects\IProduct');
        $product->setId($id);

        return $this->_productService->get($product);
    }

    public function delete($id)
    {
        $product = resolve('App\BusinessObjects\IProduct');
        $product->setId($id);

        $this->_productService->delete($product);
    }
}
