<?php

namespace App\ViewModels;

use App\Services\IProductService;

class ViewProductModel implements IViewProductModel
{
    private $_productService;

    public function __construct(IProductService $productService)
    {
        $this->_productService = $productService;
    }

    public function getAll()
    {
        return $this->_productService->getAll();
    }

    public function get($id)
    {
        $product = resolve('App\BusinessObjects\IProduct');
        $product->setId($id);

        return $this->_productService->get($product);
    }

    public function delete($id)
    {
        $product = resolve('App\BusinessObjects\IProduct');
        $product->setId($id);

        $this->_productService->delete($product);
    }

    public function getProductsJsonData(DataTablesModel $dataTablesModel)
    {
        $records = $this->_productService->getProducts(
            $dataTablesModel->getSearchText(),
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

    private function getProductFieldValues($productData)
    {
        $products = [];
        for ($i = 0; $i < count($productData); $i++) {
            $product[] = [
                "$productData->getId()",
                "$productData->getName()",
                "$productData->getImage()",
                "$productData->getPrice()",
                "$productData->getDiscount()",
            ];
        }

        return $products;
    }
}
