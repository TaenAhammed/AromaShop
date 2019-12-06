<?php

namespace App\Factories;

use App\BusinessObjects\ICategory;
use App\ViewModels\ICreateCategoryModel;

class ProductCategoryFactory
{
    public static function productCategoryBOFromModel(ICreateCategoryModel $model)
    {
        $productCategory = resolve('App\BusinessObjects\ICategory');
        $productCategory->setId($model->id);
        $productCategory->setName($model->name);

        return $productCategory;
    }

    public static function productCategoryModelFromBO(ICategory $model)
    {
        $productCategory = ['name' => $model->getName()];

        return $productCategory;
    }

    public static function createCategoriesBO($categoriesArr)
    {
        $categories = [];

        foreach ($categoriesArr as $categoriesArrItem) {
            $category = resolve('App\BusinessObjects\ICategory');

            $category->setId($categoriesArrItem['id']);
            $category->setName($categoriesArrItem['name']);

            $categories[] = $category;
        }

        return $categories;
    }
}
