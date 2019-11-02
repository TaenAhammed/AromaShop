<?php

namespace App\Repositories;

interface ICouponRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
