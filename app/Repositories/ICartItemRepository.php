<?php

namespace App\Repositories;

interface ICartItemRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
