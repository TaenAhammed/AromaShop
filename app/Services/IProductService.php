<?php

namespace App\Services;

use App\BusinessObjects\IProduct;

interface IProductService
{
    public function store(IProduct $product): void;

    public function getAll();

    public function getProducts($searchText, $sortOrder, $pageIndex, $pageSize);

    public function get($product);

    public function delete($product);

    public function update($product);
}
