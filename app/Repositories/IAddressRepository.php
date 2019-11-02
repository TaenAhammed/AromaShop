<?php

namespace App\Repositories;

interface IAddressRepository
{
    public function get();
    public function getAll();
    public function add();
    public function update();
    public function delete();
}
