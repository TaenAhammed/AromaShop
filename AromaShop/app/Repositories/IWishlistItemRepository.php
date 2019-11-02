<?php

namespace App\Repositories;

interface IWishlistItemRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
