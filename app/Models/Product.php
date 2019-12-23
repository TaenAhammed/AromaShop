<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'discount_id', 'product_vendor_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
