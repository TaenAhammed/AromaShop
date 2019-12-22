<?php

namespace App\ViewModels;

interface IViewProductModel
{
    public function getAll();

    public function get($id);

    public function delete($id);

    public function getProductsJsonData(DataTablesModel $dataTablesModel);
}
