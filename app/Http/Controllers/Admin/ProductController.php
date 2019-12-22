<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SessionService\ISessionService;
use Illuminate\Support\Facades\Log;
use App\ViewModels\DataTablesModel;

class ProductController extends Controller
{
    private $_sessionService;

    public function __construct(ISessionService $sessionService)
    {
        $this->_sessionService = $sessionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewProductModel = resolve('App\ViewModels\IViewProductModel');

        $products = $viewProductModel->getAll();

        return view('admin.pages.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewCategoryModel = resolve('App\ViewModels\IViewCategoryModel');

        $categories = $viewCategoryModel->getAll();

        return view('admin.pages.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $createProductModel = resolve('App\ViewModels\ICreateProductModel');

        $createProductModel->store();
        $this->_sessionService->store('productAddedMessage', 'Product Added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewProductModel = resolve('App\ViewModels\IViewProductModel');

        $product = $viewProductModel->get($id);

        return view('admin.pages.products.update', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $createProductModel = resolve('App\ViewModels\ICreateProductModel');

        $createProductModel->update();

        return redirect('/admin/products');
    }

    public function getProductsJson(Request $request)
    {
        $viewProductModel = resolve('App\ViewModels\IViewProductModel');

        $dataTablesModel = new DataTablesModel($request);

        return $viewProductModel->getProductsJsonData($dataTablesModel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viewProductModel = resolve('App\ViewModels\IViewProductModel');

        $viewProductModel->delete($id);

        return redirect('/admin/products');
    }
}
