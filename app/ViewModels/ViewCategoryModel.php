<?php

namespace App\ViewModels;

use App\Services\IProductCategoryService;

class ViewCategoryModel implements IViewCategoryModel
{
    private $_productCategoryService;

    public function __construct(IProductCategoryService $_productCategoryService)
    {
        $this->_productCategoryService = $_productCategoryService;
    }

    public function getAll()
    {
        return $this->_productCategoryService->getAll();
    }
}
