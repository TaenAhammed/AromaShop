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
}
