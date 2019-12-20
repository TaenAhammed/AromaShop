<?php

namespace App\ViewModels;

use App\Services\IProductService;
use Illuminate\Http\Request;
use App\Factories\ProductsFactory;
use App\ViewModels\ICreateProductModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class CreateProductModel implements ICreateProductModel
{
    private $_productService;
    public $id;
    public $name;
    public $image;
    public $price;
    public $category_id;
    public $discount;

    public function __construct(IProductService $productService, Request $request)
    {
        $this->_productService = $productService;
        $this->loadFields($request);
    }

    public function store()
    {
        $product = ProductsFactory::convertProductFromModel($this);
        $this->_productService->store($product);
    }

    public function update()
    {
        $product = ProductsFactory::convertProductFromModel($this);
        $this->_productService->update($product);
    }

    private function loadFields(Request $request)
    {
        $storename = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('uploads'), $storename);

        $this->id = $request->input('id');
        $this->name = $request->input('name');
        $this->image = $storename;
        $this->price = $request->input('price');
        $this->category_id = (int) $request->input('category_id');
        $this->discount = $request->input('discount');
    }
}
