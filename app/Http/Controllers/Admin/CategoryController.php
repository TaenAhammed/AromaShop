<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ViewModels\DataTablesModel;

use App\ViewModels\IViewCategoryModel;

class CategoryController extends Controller
{

    public function index(IViewCategoryModel $viewCategoryModel)
    {
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
