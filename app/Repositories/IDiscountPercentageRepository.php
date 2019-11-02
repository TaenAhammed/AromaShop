<?php

namespace App\Repositories;

interface IDiscountPercentageRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
