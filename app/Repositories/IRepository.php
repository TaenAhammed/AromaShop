<?php

namespace App\Repositories;

interface IRepository
{
    public function get($id);
    public function getAll();
    public function add(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
