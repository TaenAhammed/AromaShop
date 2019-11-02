<?php

namespace App\Repositories;

interface IDiscountRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
