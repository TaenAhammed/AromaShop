<?php

namespace App\Services;

use App\BusinessObjects\IProduct;
use App\Repositories\IProductRepository;
use App\ViewModels\PagedData;
use Illuminate\Support\Facades\Log;

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
        Log::Debug('DataFound:' . count($products));
        $totalCount = $this->_productRepository->getTotalProductCount();
        $totalDisplayCount = $this->_productRepository->getTotalDisplayableProducts($searchText);

        return new PagedData($products, $totalCount, $totalDisplayCount);
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
        $this->_productRepository->update($product, $product->getId());
    }
}
