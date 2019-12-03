<?php

namespace App\ViewModels;

use App\Services\IProductService;
use Illuminate\Support\Facades\Log;

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
            $dataTablesModel->getSortOrder(['id', 'name', 'image', 'price', 'discount', 'id']),
            $dataTablesModel->getPageIndex(),
            $dataTablesModel->getPageSize()
        );

        $total = $records->total;
        $totalFiltered = $records->totalDisplay;

        Log::debug("total:" . $total);

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
            $products[] = [
                $productData[$i]->getId(),
                $productData[$i]->getName(),
                $productData[$i]->getImage(),
                $productData[$i]->getPrice(),
                $productData[$i]->getDiscount(),
                $productData[$i]->getId()
            ];
        }
        return $products;
    }
}
