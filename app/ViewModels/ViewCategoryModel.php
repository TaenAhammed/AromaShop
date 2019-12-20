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

    public function getCategoriesJsonData(DataTablesModel $dataTablesModel)
    {
        $records = $this->_productCategoryService->getCategories(
            $dataTablesModel->getSearchText(),
            $dataTablesModel->getSortOrder(['id', 'name', 'id']),
            $dataTablesModel->getPageIndex(),
            $dataTablesModel->getPageSize()
        );

        $total = $records->total;
        $totalFiltered = $records->totalDisplay;
        return
            [
                "recordsTotal" => $total,
                "recordsFiltered" => $totalFiltered,
                "data" => $this->getProductFieldValues($records->data)
            ];
    }

    private function getProductFieldValues($categoriesData)
    {
        $categories = [];
        for ($i = 0; $i < count($categoriesData); $i++) {
            $categories[] = [
                $categoriesData[$i]->getId(),
                $categoriesData[$i]->getName(),
            ];
        }
        return $categories;
    }
}
