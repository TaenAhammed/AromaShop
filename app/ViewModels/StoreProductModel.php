<?php

namespace App\ViewModels;

use App\Services\IProductService;

class StoreProductModel implements IStoreProductModel
{
    private $_productService;
    private $_product; // global property not need. refactor needed later.

    public function __construct(IProductService $productService)
    {
        $this->_productService = $productService;
    }

    public function store($request)
    {
        $this->_product = resolve('App\BusinessObjects\IProduct');

        $this->_product->setName($request->input('name'));
        $this->_product->setImage($request->input('image'));
        $this->_product->setPrice($request->input('price'));
        $this->_product->setCategory($request->input('category'));
        $this->_product->setDiscount($request->input('discount'));

        $this->_productService->store($this->_product);
    }
}
