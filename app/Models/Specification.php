<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = ['name', 'value'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
