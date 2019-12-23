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
        $product = ProductsFactory::createProductBOFromModel($this);
        $this->_productService->store($product);
    }

    public function update()
    {
        $product = ProductsFactory::createProductBOFromModel($this);
        $this->_productService->update($product);
    }

    private function loadFields(Request $request)
    {
        if ($request->file('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads'), $imageName);
            $this->image = $imageName;
        }

        if (!$this->image) {
            $this->image = 'Not Available';
        }

        $this->id = $request->input('id');
        $this->name = $request->input('name');
        $this->price = $request->input('price');
        $this->category_id = (int) $request->input('category_id');
        $this->discount = $request->input('discount') ?? 0;
    }
}
