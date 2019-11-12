<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements IRepository
{
    protected $model;

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function add($data)
    {
        $this->model->create($data);
    }

    public function update($data, $id)
    {
        $record = $this->find($id);
        $record->update($data);
    }

    public function delete($id)
    {
        $this->model->destroy($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
}
