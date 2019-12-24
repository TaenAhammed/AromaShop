<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVendor extends Model
{
    protected $fillable = ['name', 'logo_url'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
