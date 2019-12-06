<?php

namespace App\Services;

use App\Services\IProductCategoryService;
use App\Repositories\IProductCategoryRepository;
use App\BusinessObjects\ICategory;


class ProductCategoryService implements IProductCategoryService
{
    private $_productCategoryRepository;

    public function __construct(IProductCategoryRepository $productCategoryRepository)
    {
        $this->_productCategoryRepository = $productCategoryRepository;
    }

    public function store(ICategory $category)
    {
        $this->_productCategoryRepository->add($category);
    }

    public function getAll()
    {
        return $this->_productCategoryRepository->getAll();
    }
}
