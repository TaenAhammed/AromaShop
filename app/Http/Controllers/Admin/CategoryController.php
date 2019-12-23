<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SessionService\ISessionService;
use App\ViewModels\DataTablesModel;


class CategoryController extends Controller
{
    private $_sessionService;

    public function __construct(ISessionService $sessionService)
    {
        $this->_sessionService = $sessionService;
    }

    public function index()
    {
        $viewCategoryModel = resolve('App\ViewModels\IViewCategoryModel');

        $categories = $viewCategoryModel->getAll();
        // return $categories;
        // var_dump($categories);

        return view('admin.pages.categories.index');
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store()
    {
        $createCategoryModel = resolve('App\ViewModels\ICreateCategoryModel');

        $createCategoryModel->store();
        $this->_sessionService->store('categoryAddedMessage', 'Category Added');

        return redirect()->back();
    }

    public function show($id)
    {
        return "<h1>This functionality is not added yet.</h1>";
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getCategoriesJson(Request $request)
    {
        $dataTablesModel = new DataTablesModel($request);
        $model = resolve('App\ViewModels\IViewCategoryModel');
        return $model->getCategoriesJsonData($dataTablesModel);
    }
}
