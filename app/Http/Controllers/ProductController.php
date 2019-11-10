<?php

namespace App\Http\Controllers;

use App\ViewModels\IStoreProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('createproduct');
    }

    public function store(Request $request, IStoreProductModel $storeProductModel)
    {
        $storeProductModel->store($request);
    }
}
