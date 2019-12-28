<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ViewModels\IViewProductModel;
use App\DTO\ProductDTO;

class ProductController extends Controller
{
    private $successCode = 200;

    public function index(IViewProductModel $ViewProductModel)
    {
        $products = $ViewProductModel->getAll();
        $productsDTO = [];
        for($i = 0; $i< sizeof($products); $i++)
        {
            $productsDTO[] = new ProductDTO($products[$i]->getId(), $products[$i]->getName(), $products[$i]->getPrice());
        }
        return response()->json(['data' => $productsDTO], $this->successCode);
    }
}
