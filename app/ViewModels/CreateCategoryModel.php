<?php

namespace App\ViewModels;
use Illuminate\Http\Request;
use App\Services\IProductCategoryService;
use App\Factories\ProductCategoryFactory;

class CreateCategoryModel implements ICreateCategoryModel
{ 
    public $id;
    public $name;
    private $_productCategoryService;

    public function __construct(IProductCategoryService $_productCategoryService, Request $request){
        $this->_productCategoryService = $_productCategoryService;
        $this->loadFields($request);
    }

    public function store(){
        $productCategory = ProductCategoryFactory::productCategoryBOFromModel($this);
        $this->_productCategoryService->store($productCategory);
    }

    private function loadFields(Request $request){
        $this->name = $request->input('name');
    }
}
