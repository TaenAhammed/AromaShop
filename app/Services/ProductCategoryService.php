<?php

namespace App\Services;

use App\Services\IProductCategoryService;
use App\Repositories\IProductCategoryRepository;
use App\BusinessObjects\ICategory;
use App\ViewModels\PagedData;



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

    public function getCategories($searchText, $sortOrder, $pageIndex, $pageSize)
    {
        $products = $this->_productCategoryRepository->getPagedCategories($searchText, $sortOrder, $pageIndex, $pageSize);
        // Log::Debug('DataFound:' . count($products));
        $totalCount = $this->_productCategoryRepository->getTotalCategoriesCount();
        $totalDisplayCount = $this->_productCategoryRepository->getTotalDisplayableCategories($searchText);

        return new PagedData($products, $totalCount, $totalDisplayCount);
    }
}
