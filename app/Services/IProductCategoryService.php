<?php

namespace App\Services;

use App\BusinessObjects\ICategory;

interface IProductCategoryService
{
    public function store(ICategory $category);

    public function getAll();

    public function getCategories($searchText, $sortOrder, $pageIndex, $pageSize);
}
