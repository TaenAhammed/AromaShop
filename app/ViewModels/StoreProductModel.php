<?php

namespace App\ViewModels;

use App\BusinessObjects\IProduct;
use App\Services\IProductService;

class StoreProductModel implements IStoreProductModel
{
    private $_productService;
    private $_product;

    public function __construct(IProductService $productService, IProduct $product)
    {
        $this->_productService = $productService;
        $this->_product = $product;
    }

    public function store($request)
    {
        $this->_product->setName($request->input('name'));
        $this->_product->setImage($request->input('image'));
        $this->_product->setPrice($request->input('price'));
        $this->_product->setCategory($request->input('category'));
        $this->_product->setDiscount($request->input('discount'));

        $this->_productService->store($this->_product);
    }
}
