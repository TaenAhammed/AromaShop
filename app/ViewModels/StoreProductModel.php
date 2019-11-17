<?php

namespace App\ViewModels;

use App\Services\IProductService;

class StoreProductModel implements IStoreProductModel
{
    private $_productService;
    public function __construct(IProductService $productService)
    {
        $this->_productService = $productService;
    }

    public function store($request)
    {
        $product = resolve('App\BusinessObjects\IProduct');

        $product->setName($request->input('name'));
        $product->setImage($request->input('image'));
        $product->setPrice($request->input('price'));
        $product->setCategory($request->input('category'));
        $product->setDiscount($request->input('discount'));

        $this->_productService->store($product);
    }
}
