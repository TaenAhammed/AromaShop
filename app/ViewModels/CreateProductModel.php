<?php

namespace App\ViewModels;

use App\Services\IProductService;
use Illuminate\Http\Request;
use App\Factories\ProductsFactory;
use App\ViewModels\ICreateProductModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreateProductModel implements ICreateProductModel
{
    private $_productService;
    public $id;
    public $name;
    public $image;
    public $price;
    public $category;
    public $discount;

    public function __construct(IProductService $productService, Request $request)
    {
        //throw new ModelNotFoundException("request missing");

        $this->_productService = $productService;
        //$this->id = $request->input('id');
        $this->name = $request->input('name');
        $this->image = $request->input('image');
        $this->price = $request->input('price');
        $this->category = $request->input('category');
        $this->discount = $request->input('discount');
    }

    public function store($request)
    {
        $product = ProductsFactory::convertProductFromModel($this);

        $this->_productService->store($product);
    }

    public function update($request)
    {
        $product = ProductsFactory::convertProductFromModel($this);

        $this->_productService->update($product);
    }
}
