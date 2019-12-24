<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['product_id', 'quantity', 'purchase_price', 'product_vendor_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
