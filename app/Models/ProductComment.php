<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = ['product_id', 'name', 'email', 'phone', 'message'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
