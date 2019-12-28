<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ViewModels\IViewProductModel; 

class ProductController extends Controller
{
    public $successStatus = 200;
    public function index(IViewProductModel $ViewProductModel)
    {
        $products = $ViewProductModel->getAll();
        return $products;
        return response()->json(['success' => $user], $this-> successStatus); 
    }
}
