<?php

namespace App\ViewModels;

use App\Services\IProductService;

// use Illuminate\Http\Request;

class StoreProductModel implements IStoreProductModel
{
    private $_productService;

    public function __construct(IProductService $productService)
    {
        $this->_productService = $productService;
    }

    public function store($request)
    {
        $data = [
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'discount' => $request->input('discount'),
        ];

        $this->_productService->store($data);
    }
}
