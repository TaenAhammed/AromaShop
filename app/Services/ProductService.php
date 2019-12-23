<?php

namespace App\Services;

use App\BusinessObjects\IProduct;
use App\Repositories\IProductRepository;
use App\ViewModels\PagedData;
use Illuminate\Support\Facades\Log;
use File;

class ProductService implements IProductService
{
    private $_productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->_productRepository = $productRepository;
    }

    public function store(IProduct $product): void
    {
        $this->_productRepository->add($product);
    }

    public function getAll()
    {
        return $this->_productRepository->getAll();
    }

    public function getProducts($searchText, $sortOrder, $pageIndex, $pageSize)
    {
        $products = $this->_productRepository->getPagedProducts($searchText, $sortOrder, $pageIndex, $pageSize);
        $totalCount = $this->_productRepository->getTotalProductCount();
        $totalDisplayCount = $this->_productRepository->getTotalDisplayableProducts($searchText);

        return resolve('App\ViewModels\PagedData', ['data' => $products, 'total' => $totalCount, 'totalDisplay' => $totalDisplayCount]);
    }

    public function get($product)
    {
        return $this->_productRepository->get($product);
    }

    public function delete($product)
    {
        $this->_productRepository->delete($product);
    }

    public function update($product)
    {
        $oldProductData = $this->_productRepository->getById($product->getId());
        Log::Debug('Image Found:' . public_path("uploads") . "\\" . $oldProductData->getImage());
        File::delete(public_path("uploads") . "\\" . $oldProductData->getImage());
        $this->_productRepository->update($product, $product->getId());
    }
}
